<?php

namespace Dawan\BagarreSimulator\Game;

use Dawan\BagarreSimulator\Characters\BattleReady;
use Dawan\BagarreSimulator\Logger\DisplayLogger;

class Fight 
{

    private BattleReady $fighter;
    private BattleReady $opponent;

    public function __construct(BattleReady $fighter, BattleReady $opponent)
    {
        $this->fighter = $fighter;
        $this->opponent = $opponent;
    }
    

    public function startFight() {
        while(true) {
            if($this->playTurn($this->fighter, $this->opponent)) break;

            if($this->playTurn($this->opponent, $this->fighter)) break; 
        }
    }

    public function playTurn(BattleReady $attacker, BattleReady $defender) : bool
    {
        $damage = $attacker->hit($defender);
        $defender->health -= $damage;

        DisplayLogger::getInstance()->logAttack($attacker, $defender, $damage);

        if($defender->health <= 0) {
            DisplayLogger::getInstance()->logConclusion($attacker, $defender);
            return true;
        } 

        return false;
    }
}