<?php
declare(strict_types=1);

use Slim\App;
use \App\Application\Middleware\ExampleBeforeMiddleware;
use \App\Application\Middleware\ExampleAfterMiddleware;


return function (App $app) {
    $settings = $app->getContainer()->get('settings');  // $settings = content from container, returned settings table;
    $app->addErrorMiddleware($settings['displayErrorDetails'], $settings['logErrorDetails'], $settings['logErrors']);
   // $app->add(ExampleAfterMiddleware::class);
   // $app->add(ExampleBeforeMiddleware::class);
};
