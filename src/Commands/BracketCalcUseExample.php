<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 13.01.2018
 * Time: 17:39
 */

namespace Sden81\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Sden81\BracketCalc;

class BracketCalcUseExampleCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('BracketCalcUseExample')
            ->setDescription('Bracket Calculator Use Example.')
            ->setHelp('Bracket Calculator Use Example')
            ->addArgument('path', InputArgument::REQUIRED, 'Enter path to file: ');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getArgument('path');

        if (!file_exists($path)){
            $output->writeln("Error! Can't open faile: $path");
            exit;
        }

        $content = file_get_contents($path);
        $BracketCalc = new BracketCalc($content);

        try {
            $result = $BracketCalc->analyzeThis();
        } catch (\InvalidArgumentException $e) {
            echo "Invalid input string";
        }

        echo ($result) ? "It's OK :)" : "Invalid Brackets :(";
    }
}