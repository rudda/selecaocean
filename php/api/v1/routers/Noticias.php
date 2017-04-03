<?php
namespace Beltrao\api\v1\routers;
/**
 * Created by Rudda Beltrao
 * Date: 02/04/2017
 * Time: 01:48
 * Lab312 developer android  & php backend
 * www.lab312-icetufam.com.br
 * beltrao.rudah@gmail.com
 */

use Beltrao\api\v1\authentication\Auth;

use Slim\Http\Request;
use Slim\Http\Response;
use Beltrao\api\v1\application\Application;
use Beltrao\api\v1\model\noticias;


    
    $app->get('/news', function (Request $request, Response$response, $args){
        
        $auth = new Auth();

        if($auth->authenticationToken($request->getQueryParam('app_name'), $request->getQueryParam('app_pass'))){

            $application = new Application();
            $response->write($application->getNews(20, $request->getQueryParam('id')));

        }


    });
    

    $app->post('/news', function (Request $request, Response $response, $args){

        $auth = new Auth();

        if( $auth->authenticationToken($request->getParam('app_name'), $request->getParam('app_pass'))){


            if(!empty($_FILES['photo'])){
                $fileName = time().".png";
                $path = "../../../src/upload/";
                $absolutePaht = "http://localhost/selecaocean/src/upload/";
                    if(move_uploaded_file($_FILES['photo']['tmp_name'],$path.$fileName)){

                        $noticia = new noticias();

                        $noticia->titulo = $request->getParam('titulo');
                        $noticia->autor = $request->getParam('autor');
                        $noticia->descricao = $request->getParam('descricao');
                        $noticia->img = $absolutePaht.$fileName;

                        $application = new Application();
                        $response->write($application->addNews($noticia));

                    }
            

                }


            }
        }
    );



