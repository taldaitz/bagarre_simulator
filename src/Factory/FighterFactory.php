<?php

namespace Dawan\BagarreSimulator\Factory;

use Dawan\BagarreSimulator\Builder\ArseneBuilder;
use Dawan\BagarreSimulator\Builder\ArthurBuilder;
use Dawan\BagarreSimulator\Builder\ConanBuilder;
use Dawan\BagarreSimulator\Builder\MerlinBuilder;
use Dawan\BagarreSimulator\Characters\Fighter;
use Dawan\BagarreSimulator\Characters\Protection;
use Dawan\BagarreSimulator\Characters\Thief;
use Dawan\BagarreSimulator\Characters\Warrior;
use Dawan\BagarreSimulator\Characters\Weapon;
use Dawan\BagarreSimulator\Characters\Wizard;

class FighterFactory 
{

    public static function getFighterInstance(string $choice) : Fighter
    {
        if($choice == 'conan') {
            $conanBuilder = new ConanBuilder();
            return $conanBuilder->build();
        } 
        
        if($choice == 'arthur') {
    
            $arthurBuilder = new ArthurBuilder();
            return $arthurBuilder->build();
        } 
        
        if($choice == 'merlin') {
            $merlinBuilder = new MerlinBuilder();
            return $merlinBuilder;
        } 

        if($choice == 'arsene') {
            $arseneBuilder = new ArseneBuilder();
            return $arseneBuilder->build();
        }
    }

}