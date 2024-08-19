<?php

class Fighter {
    public string $name;
    public int $health;
    public int $strength;
    public int $constitution;
    public int $agility;
    public int $intelligence;

    public function displayProperties()
    {
        return '
            <section class="character_panel">
            <h2>' . $this->name . '</h2>
            <cite>Combattant</cite>
            <div class="character_energy">

                <p>
                    <span>PV : </span> ' . $this->health . '
                </p>

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

    public function hit(Fighter $target) : int 
    {
        $damage = round(( rand(0, $this->strength * 1.5) - rand(0, $target->constitution /2)) / (100 -  rand(0, $target->agility)) * 100);
        $damage = $damage > 0 ? $damage : 0;
        return $damage;
    }
}