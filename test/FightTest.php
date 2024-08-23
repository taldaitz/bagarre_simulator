<?php

use Dawan\BagarreSimulator\Game\Fight;
use PHPUnit\Framework\TestCase;

require 'mock/FighterMock.php';

class FightTest extends TestCase
{
    public function testStartFight() : void
    {
        $fighter1 = new FighterMock();
        $fighter1->name = 'Test 1';
        $fighter1->health = 140;
        $fighter1->strength = 12;
        $fighter1->constitution = 14;
        $fighter1->agility = 8;
        $fighter1->intelligence = 3;

        $fighter2 = new FighterMock();
        $fighter2->name = 'Test 2';
        $fighter2->health = 140;
        $fighter2->strength = 12;
        $fighter2->constitution = 14;
        $fighter2->agility = 8;
        $fighter2->intelligence = 3;

        $fight = new Fight($fighter1, $fighter2);

        $this->assertTrue($fight != null);
    }
}