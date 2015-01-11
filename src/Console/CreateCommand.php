<?php

namespace Studio\Console;

use Studio\Creator;
use Studio\Package;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCommand extends Command
{

    protected $creator;


    public function __construct(Creator $creator)
    {
        parent::__construct();

        $this->creator = $creator;
    }

    protected function configure()
    {
        $this
            ->setName('create')
            ->setDescription('Create a new package skeleton')
            ->addArgument(
                'package',
                InputArgument::REQUIRED,
                'The name of the package to create'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $directory = $this->creator->create(new Package('fluxbb', 'core'));

        $output->writeln("<info>Package directory $directory created.</info>");
    }
}