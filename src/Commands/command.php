<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';
require 'CreateUserCommand.php';
require 'CreateItemCommand.php';
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Application;

$app = new Application();

$app->add(new CreateUserCommand());
$app->add(new CreateItemCommand());

$app->run();