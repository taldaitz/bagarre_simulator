<?php

class Wizard extends Fighter
{
    public int $mana;

    public function getJob(): string
    {
        return 'Magicien';
    }

    public function displayRessources() : string
    {
        return  parent::displayRessources() . 
                    '<p>
                        <span>Mana : </span> ' . $this->mana . '
                    </p>'
        ;
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