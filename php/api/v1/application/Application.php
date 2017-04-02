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
require (__DIR__.'/../../../../vendor/autoload.php');
class Application
{


    public function addNews(ntc $noticia){

        $sql = 'insert into noticia(titulo, descricao, img, autor) values(:titulo, :descricao, :img, :autor)';
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

    public function getNews($limit= 20){

        $sql = 'select * from noticia order by noticia.data limit 0, '.$limit;
        $db = conexao::connect();

        if($db != null && $db!= false){

            $stmt = $db->query($sql);

            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

                $data[] = $result;

            }

            return json_encode($data);


        }


    }




}

    $com = conexao::connect();
    var_dump($com);
    
    $n  = new ntc();
    $n->titulo = 'primeira noticia';
    $n->img= 'http://google.com.img.jpg';
    $n->autor = 'rudda beltrao';
    $n->descricao = 'asdsadsadsadsadsa';

    $app = new Application();
    echo $app->addNews($n);

    echo $app->getNews();
    
    




