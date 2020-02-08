<?php

declare(strict_types=1);

use DI\Container;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;

return function (Container $container) {
    $container->set(LoggerInterface::class, function (ContainerInterface $container) { //setting logger based on LoggerInterface class, accepts container interface
        $settings = $container->get('settings')['logger']; // get logger settings

        $logger = new Logger($settings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor); //processor for logger

        $handler = new StreamHandler($settings['path'], $settings['level']); //
        $logger->pushHandler($handler);

        return $logger;
    });
    $container->get(LoggerInterface::class)->debug('example', ['context' => 'message']); //demand the log
};