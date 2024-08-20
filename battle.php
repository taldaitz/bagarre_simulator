<?php

require_once('Weapon.php');
require_once('Protection.php');
require_once('Fighter.php');
require_once('Warrior.php');
require_once('Wizard.php');
require_once('Fight.php');

function instanciateFighter(string $choice) : Fighter
{
    if($choice == 'conan') {
        $fighter = new Warrior();
        $fighter->name = 'Conan';
        $fighter->health = 140;
        $fighter->strength = 12;
        $fighter->constitution = 14;
        $fighter->agility = 8;
        $fighter->intelligence = 3;

        return $fighter;
    } 
    
    if($choice == 'arthur') {

        $weapon = new Weapon();
        $weapon->type = "Epée";
        $weapon->attack = 35;


        $shield = new Protection();
        $shield->type = 'Bouclier';
        $shield->defense = 18;

        $fighter = new Warrior();
        $fighter->name = 'Arthur';
        $fighter->health = 100;
        $fighter->strength = 10;
        $fighter->constitution = 13;
        $fighter->agility = 11;
        $fighter->intelligence = 9;

        $fighter->weapon = $weapon;
        $fighter->protection = $shield;

        return $fighter;
    } 
    
    if($choice == 'merlin') {
        $fighter = new Wizard();
        $fighter->name = 'Merlin';
        $fighter->health = 80;
        $fighter->strength = 6;
        $fighter->constitution = 8;
        $fighter->agility = 9;
        $fighter->intelligence = 30;
        $fighter->mana = 50;

        return $fighter;
    } 
}

$fighter1 = $_POST['fighter1'];
$fighter2 = $_POST['fighter2'];

$fighter = instanciateFighter($fighter1);
$opponent = instanciateFighter($fighter2);





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