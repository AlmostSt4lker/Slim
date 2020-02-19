<?php

declare(strict_types=1);

use Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Slim\Routing\RouteCollectorProxy;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

return function (App $app) {


    $app->get('/after/{name}', function (RequestInterface $request,ResponseInterface $response, $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello there, $name");
        return $response;
    });
            // Add routes that actually use twig

    $container = $app->getContainer();


    // Add app group

    $app->group('', function (RouteCollectorProxy $view){

        $view->get('/',function($request, $response){
            $view ='index.twig';
            return $this->get('view')->render($response, $view);
        });


        $view->get('/podstrona2',function($request, $response){
            $view ='test2.twig';
            return $this->get('view')->render($response, $view);
        });


        $view->get('/podstrona1', function ($request, $response, $args){
            $loader = new FilesystemLoader(__DIR__.'/../src/Views');
            $view = 'test.twig';

            return $this->get('view')->render($response, $view);         // ['name' => $name] = compact('name')


    });



        $view->get('/mvc', function ($request, $response){

            include 'autoinclude.php';

            $loader = new FilesystemLoader(__DIR__.'/../src/Views');
            $twig = new Environment($loader);
            $view = 'mvc.twig';

            $viewer = new View();
            $results = $viewer->readUsers();


            return $this->get('view')->render($response, $view, ['name' => $results]);


        });

});
};

