<?php

use Dawan\BagarreSimulator\Factory\FighterFactory;
use Dawan\BagarreSimulator\Game\Fight;
use Dawan\BagarreSimulator\Logger\DisplayLogger;

require 'vendor/autoload.php';

$character1 = $_GET['charac1'];
$character2 = $_GET['charac2'];

$fighter1 = FighterFactory::getFighterInstance($character1);
$fighter2 = FighterFactory::getFighterInstance($character2);

$fight = new Fight($fighter1, $fighter2);
$fight->startFight();
