<?php
namespace Beltrao\api\v1\routers;
/**
 * Created by Rudda Beltrao
 * Date: 02/04/2017
 * Time: 10:14
 * Lab312 developer android  & php backend
 * www.lab312-icetufam.com.br
 * beltrao.rudah@gmail.com
 */


    use Slim\Http\Request;
    use Slim\Http\Response;

    $app->get('/', function(Request $request, Response $response, $args){

        echo 'home page';

    });