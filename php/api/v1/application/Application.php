<?php
namespace Beltrao\api\v1\application;
/**
 * Created by Rudda Beltrao
 * Date: 02/04/2017
 * Time: 02:16
 * Lab312 developer android  & php backend
 * www.lab312-icetufam.com.br
 * beltrao.rudah@gmail.com
 */
use Beltrao\api\v1\model\noticias as ntc;
use Beltrao\api\v1\database\conexao;
use PDO;

class Application
{


    public function addNews(ntc $noticia){

        $sql = 'insert into noticias(titulo, descricao, img, autor) values(:titulo, :descricao, :img, :autor)';
        $db = conexao::connect();

        if($db != null && $db!= false){

            $stmt= $db->prepare($sql);

            $stmt->bindParam(':titulo', $noticia->titulo);
            $stmt->bindParam(':descricao', $noticia->descricao);
            $stmt->bindParam(':img', $noticia->img);
            $stmt->bindParam(':autor', $noticia->autor);

            if($stmt->execute()){

                return true;

            }

            return false;



        }

       return false;
    }

    public function getNews($limit){

        $sql = 'select * from noticias order by data limit 0, '.$limit;
        $db = conexao::connect();

        if($db != null && $db!= false){

            $stmt = $db->prepare($sql);

            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

                $data[] = $result;

            }

            return json_encode($data);


        }


    }


    

}