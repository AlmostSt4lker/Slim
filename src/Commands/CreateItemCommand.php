<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class CreateItemCommand extends Command
{

    protected function configure()
    {
        $this->setName('app:createItem');
        $this->setDescription('Create item in database (<name> <stock> <price>)')
        ->addArgument('name', InputArgument::REQUIRED, 'Name of new item')
        ->addArgument('stock', InputArgument::REQUIRED, 'Amount of new item')
        ->addArgument('price', InputArgument::REQUIRED, 'Price of new item');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        include "autoinclude.php";


        $test = new Controller();
        $test->insertItem($input->getArgument('name'), $input->getArgument('stock'), $input->getArgument('price'));

        return 0;
    }

}
