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
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Beltrao\api\v1\application\Application;
use Beltrao\api\v1\model\noticias;

$app = new App();
    
    $app->get('/news', function (Request $request, Response$response, $args){
        
        if(Auth::authenticationToken($request->getQueryParam('token'))){
            
            $application = new Application();
            $response->write($application->getNews());
            
        }
            
        
    });
    
    $app->put('/news', function (Request $request, Response $response, $args){

        if(Auth::authenticationToken($request->getQueryParam('token'))){

            $noticia = new noticias();

            
            $noticia->titulo = $request->getParam('titulo');
            $noticia->autor = $request->getParam('autor');
            $noticia->descricao = $request->getParam('descricao');
            
            //aqui é um file
            $noticia->img = $request->getParam('img');
            
            
            $application = new Application();
            $response->write($application->addNews($noticia));

        }
    });




