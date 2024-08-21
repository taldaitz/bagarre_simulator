<?php

namespace Dawan\BagarreSimulator\Characters;

use Dawan\BagarreSimulator\Characters\Fighter;

interface BattleReady {
    public function getJob() : string;
    public function getRessources() : array;
    public function getAttack() : int;
    public function getDefense() : int;
    public function hit(Fighter $target) : int;
}