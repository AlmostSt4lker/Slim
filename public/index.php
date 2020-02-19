<?php

declare(strict_types=1);

use Slim\Factory\AppFactory;
use DI\Container;


require __DIR__ . '/../vendor/autoload.php';

$container = new Container();

$settings = require __DIR__.'/../app/settings.php'; // $settings = returned function
$settings($container); //Passing in $container to settings

$logger = require __DIR__.'/../app/logger.php'; // $logger = returned function
$logger($container); //Passing in $container to logger

//Set container on app
AppFactory::setContainer($container);

$app = AppFactory::create();

$view = require __DIR__.'/../app/views.php';
$view($app);

$middleware = require __DIR__.'/../app/middleware.php'; // $Middleware = returned function
$middleware($app); //Passing in $app to Middleware function

$routes = require __DIR__.'/../app/routes.php'; // $routes = returned function
$routes($app); // Pass in $app to routes

$app->run();
