<?php
declare(strict_types=1);

use DI\Container;
use Monolog\Logger;

return function (Container $container) {
    // Global Settings
    $container->set('settings',function() {


        return [
            'name' => 'ExampleSlimApp',
            'displayErrorDetails' => true,
            'logErrorDetails' => true,
            'logErrors' => true,

            //Add logger

            'logger' => [
                'name' => 'slim-app',
                'path' => __DIR__.'/../logs/app.log',
                'level' => Logger::DEBUG,
            ],

            'views' => [
                'path' => __DIR__.'/../src/Views', //path to twig templates
                'settings' => ['# cache' => 'false'], // twig setting
            ]
        ];
    });
};


// use $container->get('settings') wherever