<?php
require 'vendor/autoload.php';

use Dawan\BagarreSimulator\Factory\FighterFactory;
use Dawan\BagarreSimulator\Game\Fight;
use Dawan\BagarreSimulator\Logger\DisplayLogger;

$fighter1 = $_POST['fighter1'];
$fighter2 = $_POST['fighter2'];

$fighter = FighterFactory::getFighterInstance($fighter1);
$opponent = FighterFactory::getFighterInstance($fighter2);

$logger = DisplayLogger::getInstance();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagarre Simulator</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <?php   
           echo $logger->logFighterPresentation($fighter);
        ?>

        <span class="title">
            VS
        </span>

        <?php 
            echo $logger->logFighterPresentation($opponent);
        ?>
    </header>

    <main>
        <section id="fight_log">
            <?php

            $fight = new Fight($fighter, $opponent);
            $fight->startFight();            

            ?>
        </section>
    </main>
    
</body>
</html>