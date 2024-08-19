<?php

$fighterName = 'Arthur';
$fighterHealth = 120;
$fighterStrength = 10;
$fighterConstitution = 10;
$fighterAgility = 10;
$fighterIntelligence = 10;


$opponentName = 'Lancelot';
$opponentHealth = 100;
$opponentStrength = 14;
$opponentConstitution = 8;
$opponentAgility = 6;
$opponentIntelligence = 12;




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
            $character = [
                'name' => $fighterName,
                'health' => $fighterHealth,
                'strengh' => $fighterStrength,
                'constitution' => $fighterConstitution,
                'agility' => $fighterAgility,
                'intelligence' => $fighterIntelligence,
            ]; 
            include "character.php"; 
        ?>

        <span class="title">
            VS
        </span>

        <?php 
            $character = [
                'name' => $opponentName,
                'health' => $opponentHealth,
                'strengh' => $opponentStrength,
                'constitution' => $opponentConstitution,
                'agility' => $opponentConstitution,
                'intelligence' => $opponentIntelligence,
            ];
            include "character.php"; 
        ?>
    </header>

    <main>
        <section id="fight_log">
            <?php

            while(true) {

                $damage = round(( rand(0, $fighterStrength * 1.5) - rand(0, $opponentConstitution /2)) / (100 -  rand(0, $opponentAgility)) * 100);
                $damage = $damage > 0 ? $damage : 0;
                $opponentHealth -= $damage;

                echo "<p class='log'>$fighterName attaque $opponentName et cause $damage de dégats - 
                il reste $opponentHealth de PV à $opponentName</p>";

                if($opponentHealth <= 0) break;

                $damage = round((  rand(0, $opponentStrength * 1.5) -  rand(0, $fighterConstitution /2) ) / (100 -  rand(0, $fighterAgility)) * 100);
                $damage = $damage > 0 ? $damage : 0;
                $fighterHealth -= $damage > 0 ? $damage : 0;

                echo "<p class='log alignRight'>$opponentName attaque $fighterName et cause $damage de dégats - 
                il reste $fighterHealth de PV à $fighterName</p>";

                if($fighterHealth <= 0) break;
                
            }

            if($fighterHealth <= 0) echo "<p class='conclusion'>$fighterName a perdu. Vive $opponentName<p>";
            if($opponentName <= 0) echo "<p class='conclusion'>$opponentName a perdu. Vive $fighterName<p>";

            ?>
        </section>
    </main>
    
</body>
</html>