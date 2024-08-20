<?php

namespace Dawan\BagarreSimulator\Characters;

abstract class Fighter {
    public string $name;
    public int $health;
    public int $strength;
    public int $constitution;
    public int $agility;
    public int $intelligence;

    public ?Weapon $weapon = null;
    public ?Protection $protection = null;

    public abstract function getJob() : string;

    public function displayRessources() : string
    {
        return '<p>
                    <span>PV : </span> ' . $this->health . '
                </p>';
    }

    public function displayProperties()
    {
        return '
            <section class="character_panel">
            <h2>' . $this->name . '</h2>
            <cite>' . $this->getJob() . '</cite>
            <div class="character_energy">

                ' . $this->displayRessources() . '

            </div>
            <div class="character_stats">
                <ul>
                    <li>Force : ' . $this->strength . '</li>
                    <li>Constitution : ' . $this->constitution . '</li>
                    <li>Agilité : ' . $this->agility . '</li>
                    <li>Intelligence : ' . $this->intelligence . '</li>
                </ul>
            </div>
        </section>
        ';
    }

    public function getAttack() : int
    {
        if($this->weapon != null)
            return round($this->strength * 1.5) + $this->weapon->attack;
        return round($this->strength * 1.5);
    }

    public function getDefense() : int 
    {
        if($this->protection != null)
            return round($this->constitution /2) + $this->protection->defense;
        return round($this->constitution /2);
    }

    public function hit(Fighter $target) : int 
    {
        $damage = round(( rand(0, $this->getAttack()) - rand(0, $target->getDefense())) / (100 -  rand(0, $target->agility)) * 100);
        $damage = $damage > 0 ? $damage : 0;
        return $damage;
    }
}