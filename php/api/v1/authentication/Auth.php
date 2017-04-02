<?php
namespace Beltrao\api\v1\authentication;
/**
 * Created by Rudda Beltrao
 * Date: 02/04/2017
 * Time: 01:52
 * Lab312 developer android  & php backend
 * www.lab312-icetufam.com.br
 * beltrao.rudah@gmail.com
 */
use Beltrao\api\v1\database\conexao;
class Auth
{

    
    
    public static function authenticationToken ($app_name, $app_pass){
        
        $conn = conexao::connect();
        
        if($conn){

            $smt = $conn->prepare('select app_token from base-authentication where app_name = :app_name');
            $smt->bindValue(':app_name', $app_name);
            $smt->execute();

            if($result = $smt->fetch(\PDO::FETCH_ASSOCC)){

                if(password_verify($app_name.$app_pass, $result['app_token'])){

                    $rehash = password_needs_rehash($result['app_token'],
                        PASSWORD_DEFAULT, array('cost'=>15)
                        );

                    if($rehash === true){

                        password_hash($result['app_token'], PASSWORD_DEFAULT, ['cost'=>15]);
                        updateToken($app_name, $result['app_token']);

                    }
                    return true;
                }


            }


        }


        return false;

    }


    /*
     * addToken
     * @param string $name
     * @param string $pass
     *
     * @return string
     * */
    public function addToken($name, $pass){

        $token = $name.$pass;
        $token = password_hash($token, PASSWORD_DEFAULT, ['cost'=>12]);

        $db = conexao::connect();

        if($db!= false && $db!= null){

            $sql = 'insert into base-authentication (app_name, app_token) values (:n, :tk)';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':tk', $token);
            $stmt->bindParam(':n', $name);

            if($stmt->execute()){

                return true;
            }


        }

        return false;


    }

    /*
     * updateToken
     *
     * @param string $app_name
     * @param string $token
     *
     * @return boolean
     * */

    public function updateToken($app_name, $token){

        $sql = 'update base-authentication set app_token = '.$token.' where app_name = '.$app_name;
        $db = conexao::connect();
        return $db->exec($sql);

    }


}