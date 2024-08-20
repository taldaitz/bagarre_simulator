<?php

namespace Dawan\BagarreSimulator\Game;

use Dawan\BagarreSimulator\Characters\Fighter;
use Dawan\BagarreSimulator\Logger\DisplayLogger;

class Fight 
{

    private Fighter $fighter;
    private Fighter $opponent;
    private DisplayLogger $displayLogger;

    public function __construct(Fighter $fighter, Fighter $opponent)
    {
        $this->fighter = $fighter;
        $this->opponent = $opponent;
        $this->displayLogger = new DisplayLogger();
    }
    

    public function startFight() {
        while(true) {
            if($this->playTurn($this->fighter, $this->opponent)) break;

            if($this->playTurn($this->opponent, $this->fighter)) break; 
        }
    }

    public function playTurn(Fighter $attacker, Fighter $defender) : bool
    {
        $damage = $attacker->hit($defender);
        $defender->health -= $damage;
        
        $this->displayLogger->logAttack($attacker, $defender, $damage);

        if($defender->health <= 0) {
            $this->displayLogger->logConclusion($attacker, $defender);
            return true;
        } 

        return false;
    }
}