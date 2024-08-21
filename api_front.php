<?php

use Dawan\BagarreSimulator\Factory\FighterFactory;
use Dawan\BagarreSimulator\Logger\DisplayLogger;

require 'vendor/autoload.php';

$character = $_GET['charac'];

$fighter = FighterFactory::getFighterInstance($character);

echo DisplayLogger::getInstance()->logFighterPresentation($fighter);
