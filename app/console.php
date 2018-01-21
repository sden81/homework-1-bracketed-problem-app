<?php
set_time_limit(0);

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Sden81\Commands\BracketCalcUseExampleCommand;

$application = new Application;
$application->add(new BracketCalcUseExampleCommand());
$application->run();