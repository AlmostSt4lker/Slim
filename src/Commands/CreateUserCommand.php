<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateUserCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:createUser';

    public function __construct(bool $requirePassword = true)
    {
        $this->requirePassword = $requirePassword;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Create user in database')
            ->addArgument('password', $this->requirePassword ? InputArgument::REQUIRED : InputArgument::OPTIONAL, 'User password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // ...

        return 0;
    }
}