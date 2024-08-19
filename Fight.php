<?php

class Fight 
{

    private Fighter $fighter;
    private Fighter $opponent;

    public function __construct(Fighter $fighter, Fighter $opponent)
    {
        $this->fighter = $fighter;
        $this->opponent = $opponent;
    }
    

    public function startFight() {
        while(true) {

            if($this->playTurn($this->fighter, $this->opponent)) break;

            if($this->playTurn($this->opponent, $this->fighter, true)) break; 
        }
    }

    public function playTurn(Fighter $attacker, Fighter $defender, bool $alignRight = false) : bool
    {
        $damage = $attacker->hit($defender);
        $defender->health -= $damage;
        $cssClass = $alignRight ? 'log alignRight' : 'log';

        echo "<p class='$cssClass'>" . $attacker->name ." attaque " . $defender->name ." cause $damage de dégats - 
        il reste " . $defender->health . " de PV à " . $defender->name ."</p>";

        if($defender->health <= 0) {
            echo "<p class='conclusion'>" .$defender->name ." a perdu. Vive " .$attacker->name . "<p>";
            return true;
        } 

        return false;
    }
}