<?php

namespace Dawan\BagarreSimulator\Characters;

class Wizard extends Fighter
{
    public int $mana;

    public function __construct(int $mana)
    {
        $this->mana = $mana;
    }

    public function getJob(): string
    {
        return 'Magicien';
    }

    public function getRessources() : array
    {
        $ressources = parent::getRessources();
        $ressources['Mana'] = $this->mana;
        return $ressources;
    }

    public function hit(Fighter $target): int
    {
        if($this->mana <= 0) return parent::hit($target);
        $this->mana -= 5;

        $damage = round(( rand(0, round($this->intelligence * 2.5)) - rand(0, round($target->constitution / 3))) / (100 -  rand(0, $target->agility)) * 100);
        $damage = $damage > 0 ? $damage : 0;
        return $damage;
    }
}