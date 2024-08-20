<?php

namespace Dawan\BagarreSimulator\Builder;

use Dawan\BagarreSimulator\Characters\Fighter;
use Dawan\BagarreSimulator\Characters\Protection;
use Dawan\BagarreSimulator\Characters\Warrior;
use Dawan\BagarreSimulator\Characters\Weapon;

class ArthurBuilder
{
    public function build() : Fighter
    {
        $weapon = new Weapon();
        $weapon->type = "Epée";
        $weapon->attack = 35;


        $shield = new Protection();
        $shield->type = 'Bouclier';
        $shield->defense = 18;

        $fighter = new Warrior();
        $fighter->name = 'Arthur';
        $fighter->health = 100;
        $fighter->strength = 10;
        $fighter->constitution = 13;
        $fighter->agility = 11;
        $fighter->intelligence = 9;

        $fighter->weapon = $weapon;
        $fighter->protection = $shield;

        return $fighter;
    }
}