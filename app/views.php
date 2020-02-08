<?php

declare(strict_types=1);

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\Loader\FilesystemLoader;


return function (App $app){
    $container = $app->getContainer(); // get container from app

    $container->set('view', function() use ($container){ //set view key

       $settings = $container->get('settings')['views'];   //get setting views
       $loader = new FilesystemLoader($settings['path']);  // create new file loader, referencing 'path' from settings

       return new Twig($loader, $settings['settings']);     //create new twig using loader and settings

    });

    $container->set('viewMiddleware', function() use ($app, $container)    //create viewMiddleware which is TwigMiddleware
    {
        return new TwigMiddleware($container->get('view'), $app->getRouteCollector()->getRouteParser()); //using container get view
    });
};