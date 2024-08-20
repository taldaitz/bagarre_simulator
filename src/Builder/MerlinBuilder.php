<?php

namespace Dawan\BagarreSimulator\Builder;

use Dawan\BagarreSimulator\Characters\Fighter;
use Dawan\BagarreSimulator\Characters\Wizard;

class MerlinBuilder
{
    public function build() : Fighter
    {
        $fighter = new Wizard(50);
        $fighter->name = 'Merlin';
        $fighter->health = 80;
        $fighter->strength = 6;
        $fighter->constitution = 8;
        $fighter->agility = 9;
        $fighter->intelligence = 30;

        return $fighter;
    }
}