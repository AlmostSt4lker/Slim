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



    $view->get('/podstrona1', function ($request, $response, $args){
        $loader = new FilesystemLoader(__DIR__.'/../src/Views');
        $view = 'test.twig';

        include 'autoinclude.php';

        $uid = 'Adam';
        $user = new View();
        $name = $user->readUserId($uid);
        $email = $user->readUserEmail($uid);

        $capitalize = new Controller();
        $nameToPass = $capitalize->capitalize($name);


        return $this->get('view')->render($response, $view, compact('nameToPass', 'email'));         // ['name' => $name] = compact('name')


    });



        $view->get('/podstrona2',function($request, $response){
            include 'autoinclude.php';

            $view ='test2.twig';

            $item = new View();
            $item_name = $item->readItemName();
            $item_stock = $item->readItemStock();
            $item_price = $item->readItemPrice();
            $item_test = $item->readItemTest();

            $integer = 0;
            foreach($item_test as $value){
                $integer++;
                $arr[$integer] = $value;
            }

            return $this->get('view')->render($response, $view, compact('item_name', 'item_stock', 'item_price', 'arr'));
        });




        $view->get('/mvc', function ($request, $response){

        include 'autoinclude.php';

        $loader = new FilesystemLoader(__DIR__.'/../src/Views');
        $twig = new Environment($loader);
        $view = 'mvc.twig';

        $item = new View();
        $item_test = $item->readItemTest();

        $integer = 0;
        foreach($item_test as $value){
            $integer++;
            $arr[$integer] = $value;
        }


        return $this->get('view')->render($response, $view, ['array' => $arr]);


    });

});
};