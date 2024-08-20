<?php

namespace Dawan\BagarreSimulator\Logger;

use Dawan\BagarreSimulator\Characters\Fighter;

class DisplayLogger
{
    private bool $alternateTurn = false;

    public function logFighterRessources(Fighter $fighter) : string 
    {
        $ressources = $fighter->getRessources();
        $display = '';

        foreach($ressources as $key => $value) {
            $display .= '<p><span>' . $key . ' : </span> ' . $value . '</p>';
        }

        return $display;
        
    }

    public function logFighterPresentation(Fighter $fighter) : string
    {
        return '
            <section class="character_panel">
            <h2>' . $fighter->name . '</h2>
            <cite>' . $fighter->getJob() . '</cite>
            <div class="character_energy">

                ' . $this->logFighterRessources($fighter) . '

            </div>
            <div class="character_stats">
                <ul>
                    <li>Force : ' . $fighter->strength . '</li>
                    <li>Constitution : ' . $fighter->constitution . '</li>
                    <li>Agilité : ' . $fighter->agility . '</li>
                    <li>Intelligence : ' . $fighter->intelligence . '</li>
                </ul>
            </div>
        </section>
        ';
    }

    public function logAttack(Fighter $attacker, Fighter $defender, int $damage) : void
    {
        $cssClass = $this->alternateTurn ? 'log alignRight' : 'log';
        $this->alternateTurn = !$this->alternateTurn;

        echo "<p class='$cssClass'>" . $attacker->name ." attaque " . $defender->name ." cause $damage de dégats - 
        il reste " . $defender->health . " de PV à " . $defender->name ."</p>";
    }

    public function logConclusion(Fighter $attacker, Fighter $defender) : void
    {
        echo "<p class='conclusion'>" .$defender->name ." a perdu. Vive " .$attacker->name . "<p>";
    }
}