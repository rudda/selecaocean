<?php
namespace Beltrao\api\v1;

/**
 * Created by Rudda Beltrao
 * Date: 01/04/2017
 * Time: 23:36
 * Istituto de Ciencia e Tecnologia do Amazonas - ICET
 * Universidade Federal do Amazonas - UFAM
 * Lab312 - ICET, UFAM.
 * Lab312 developer android  & php backend
 * www.lab312-icetufam.com.br
 * beltrao.rudah@gmail.com
 */
    mb_internal_encoding("UTF-8");
    mb_http_output( "iso-8859-1" );
    ob_start("mb_output_handler");
    setlocale(LC_ALL, 'pt_BR.utf8');

    require (__DIR__.'/../../../vendor/autoload.php');
    use Slim\App;

    $app = new App();
    include (__DIR__.'/routers/Noticias.php');
    include (__DIR__.'/routers/Home.php');
    $app->run();




