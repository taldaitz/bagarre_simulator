<?php

namespace Dawan\BagarreSimulator\Factory;

use Dawan\BagarreSimulator\Builder\ArseneBuilder;
use Dawan\BagarreSimulator\Builder\ArthurBuilder;
use Dawan\BagarreSimulator\Builder\ConanBuilder;
use Dawan\BagarreSimulator\Builder\MerlinBuilder;
use Dawan\BagarreSimulator\Characters\Fighter;

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
            return $merlinBuilder->build();
        } 

        if($choice == 'arsene') {
            $arseneBuilder = new ArseneBuilder();
            return $arseneBuilder->build();
        }
    }

}