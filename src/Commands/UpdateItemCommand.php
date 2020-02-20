<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class UpdateItemCommand extends Command
{

    protected function configure()
    {
        $this->setName('app:updateItem');
        $this->setDescription('Update item in database (<name> or <stock> or <price>)')
        ->addArgument('name', InputArgument::REQUIRED, 'What item? ')
        ->addArgument('change', InputArgument::REQUIRED, 'What to change?')
        ->addArgument('value', InputArgument::REQUIRED, 'New value? ');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        include "autoinclude.php";


        $test = new Controller();
        $test->updateItem($input->getArgument('name'), $input->getArgument('change'), $input->getArgument('value'));

        return 0;
    }

}
