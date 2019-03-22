<?php 
// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\RandomService;

class CreateUserCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:random';

    protected function configure()
    {
        $r = new RandomService();
        print($r->getRandom());

    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // ...
    }
}
