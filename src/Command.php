<?php
namespace k4ml\postrack;

use Symfony\Component\Console\Command\Command as ConsoleCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use k4ml\postrack\Tracker;
use k4ml\postrack\Parcel\Poslaju as Parcel;

class Command extends ConsoleCommand {
    protected function configure() {
        $this
            ->setName('check')
            ->setDescription('Check Parcel')
            ->addArgument('parcelNo', InputArgument::REQUIRED, 'Parcel No')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $parcelNo = $input->getArgument('parcelNo');
        $p = new Parcel($parcelNo);
        $results = $p->check();
        foreach ($results as $result) {
            if (strpos($result['status'], 'delivered')) {
                $output->writeln("<info>".implode(' ', $result)."</info>");
            }
            else {
                $output->writeln("<comment>".implode(' ', $result)."</comment>");
            }
        }
    }
}
