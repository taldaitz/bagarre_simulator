<?php

namespace Dawan\BagarreSimulator\Game;

use Dawan\BagarreSimulator\Characters\BattleReady;
use Dawan\BagarreSimulator\Logger\DisplayLogger;
use Symfony\Component\HttpClient\HttpClient;

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


            if($attacker->webId != null || $defender->webId != null) {
                $client = HttpClient::create();

                if($attacker->webId != null)
                    $client->request('POST', 'http://localhost:8000/api/character-wins', 
                        [
                            'body' => ['winner_id' => $attacker->webId]
                        ]
                    );

                if($defender->webId != null)
                    $client->request('POST', 'http://localhost:8000/api/character-looses', 
                        [
                            'body' => ['looser_id' => $defender->webId]
                        ]
                    );
            }

            return true;
        } 

        return false;
    }
}