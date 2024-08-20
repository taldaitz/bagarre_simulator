<?php

namespace Dawan\BagarreSimulator\Builder;

use Dawan\BagarreSimulator\Characters\Fighter;
use Dawan\BagarreSimulator\Characters\Thief;
use Dawan\BagarreSimulator\Characters\Weapon;

class ArseneBuilder
{
    public function build() : Fighter
    {
        $weapon = new Weapon();
        $weapon->type = 'Couteau';
        $weapon->attack = 25;

        $fighter = new Thief();
        $fighter->name = 'Arsène';
        $fighter->health = 90;
        $fighter->strength = 9;
        $fighter->constitution = 12;
        $fighter->agility = 30;
        $fighter->intelligence = 16;
        $fighter->weapon = $weapon;

        return $fighter;
    }
}