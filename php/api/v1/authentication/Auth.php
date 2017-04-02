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
class Auth
{

    private function connect(){

        try {
            $conn = new PDO('mysql:host=localhost'.';dbname=portal-aluno', 'root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }

        catch(PDOException $e)
        {
            return false;
        }



    }
    
    public static function authenticationToken ($token){
        $conn = Auth::connect();
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