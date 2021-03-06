<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateUserCommand extends Command
{

    protected function configure()
    {
        $this
        ->setName('app:createUser')
        ->setDescription('Create user in database')
        ->addArgument('uid', InputArgument::REQUIRED, 'Username of new user')
        ->addArgument('password', InputArgument::REQUIRED, 'Password of new user')
        ->addArgument('email', InputArgument::REQUIRED, 'Email new user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        include "autoinclude.php";


        $test = new Controller();
        $test->insertUser($input->getArgument('uid'), $input->getArgument('email'), $input->getArgument('password'));

        return 0;
    }

}
