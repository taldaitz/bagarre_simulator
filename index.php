<?php

require_once('Fighter.php');
require_once('Warrior.php');
require_once('Wizard.php');
require_once('Fight.php');

$fighter = new Warrior();
$fighter->name = 'Conan';
$fighter->health = 140;
$fighter->strength = 12;
$fighter->constitution = 14;
$fighter->agility = 8;
$fighter->intelligence = 3;


$opponent = new Wizard();
$opponent->name = 'Merlin';
$opponent->health = 80;
$opponent->strength = 6;
$opponent->constitution = 8;
$opponent->agility = 9;
$opponent->intelligence = 30;
$opponent->mana = 50;



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