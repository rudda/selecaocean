<?php
namespace Beltrao\api\v1\database;
use PDO;
    class conexao{

        static function connect(){

            try {
                $conn = new PDO('mysql:host=localhost'.';dbname=comicnews', 'root','');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            }

            catch(PDOException $e)
            {
                return false;
            }


        }


    }
    