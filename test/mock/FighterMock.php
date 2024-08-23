<?php

use Dawan\BagarreSimulator\Characters\Fighter;

class FighterMock extends Fighter
{
    public function getJob(): string
    {
        return "Fighter de test";
    }
}