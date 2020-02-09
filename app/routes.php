<?php

declare(strict_types=1);

use Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Slim\Routing\RouteCollectorProxy;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

return function (App $app) {

    $app->get('/hello/{name}', function (RequestInterface $request,ResponseInterface $response, $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello world!, $name");
        return $response;
    });

    $app->get('/after/{name}', function (RequestInterface $request,ResponseInterface $response, $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello there, $name");
        return $response;
    });
            // Add routes that actually use twig

    $container = $app->getContainer();


    // Add app group

    $app->group('', function (RouteCollectorProxy $view){

        $view->get('/example',function($request, $response){
            $view ='example.twig';
            return $this->get('view')->render($response, $view);
        });

        $view->get('/views/{name}', function ($request, $response, $args){
            $view = 'example.twig'; //find template
            $name = $args['name'];
            return $this->get('view')->render($response, $view, compact('name'));               // ['name' => $name] = compact('name')
        });

        $view->get('/twig/{name}/{work}', function ($request, $response, $args){
            $loader = new FilesystemLoader(__DIR__.'/../src/Views');
            $twig = new Environment($loader);
            $view = 'test.twig';
            $name = $args['name'];
            $occupation = $args['work'];

            return $this->get('view')->render($response, $view, ['name' => $name, 'occupation' => $occupation]);


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

