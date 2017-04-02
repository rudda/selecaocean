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

    
    
    public static function authenticationToken ($token){
        
        $conn = conexao::connect();
        
        if($conn){

            $smt = $conn->prepare('select token from authentication where token = :tk');
            $smt->bindValue(':tk', $token);
            $smt->execute();

            $count = $smt->rowCount();


            if ($count == 1) {

                return true;

                die;

            }

        }


        return false;

    }



}