<?php

require 'vendor/autoload.php';

use k4ml\postrack\Tracker;
use k4ml\postrack\Parcel;
use k4ml\postrack\Command;

//$p = new Parcel('EP032137416MY');
//$p2 = new Parcel('EG356977064JP');
//$t = new Tracker(array($p, $p2));
//print_r($t->check());

use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new Command);
$application->run();
