<?php

namespace Dawan\BagarreSimulator\Builder;

use Dawan\BagarreSimulator\Characters\Fighter;
use Dawan\BagarreSimulator\Characters\Warrior;

class ConanBuilder
{
    public function build() : Fighter
    {
        $fighter = new Warrior();
        $fighter->name = 'Conan';
        $fighter->health = 140;
        $fighter->strength = 12;
        $fighter->constitution = 14;
        $fighter->agility = 8;
        $fighter->intelligence = 3;

        return $fighter;
    }
}