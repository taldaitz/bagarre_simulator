<?php

require_once('Fighter.php');
require_once('Fight.php');

$fighter = new Fighter();
$fighter->name = 'Arthur';
$fighter->health = 120;
$fighter->strength = 10;
$fighter->constitution = 10;
$fighter->agility = 10;
$fighter->intelligence = 10;


$opponent = new Fighter();
$opponent->name = 'Lancelot';
$opponent->health = 100;
$opponent->strength = 14;
$opponent->constitution = 8;
$opponent->agility = 6;
$opponent->intelligence = 12;



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
           echo $fighter->displayProperties();
        ?>

        <span class="title">
            VS
        </span>

        <?php 
            echo $opponent->displayProperties();
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