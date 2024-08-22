<?php

namespace Dawan\BagarreSimulator\Factory;

use Dawan\BagarreSimulator\Builder\ArseneBuilder;
use Dawan\BagarreSimulator\Builder\ArthurBuilder;
use Dawan\BagarreSimulator\Builder\ConanBuilder;
use Dawan\BagarreSimulator\Builder\MerlinBuilder;
use Dawan\BagarreSimulator\Characters\Fighter;
use Dawan\BagarreSimulator\Characters\Thief;
use Dawan\BagarreSimulator\Characters\Warrior;
use Dawan\BagarreSimulator\Characters\Wizard;
use Symfony\Component\HttpClient\HttpClient;

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

        return self::instanciateWebCharacter($choice);
    }

    private static function instanciateWebCharacter(int $id) : Fighter
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost:8000/api/character/' . $id);

        $attributes = $response->toArray();

        switch($attributes['job']) 
        {
            case 'Warrior':
                $fighter = new Warrior();
                self::handleInstance($fighter, $attributes);
                return $fighter;

            case 'Wizard':
                $fighter = new Wizard($attributes['mana']);
                self::handleInstance($fighter, $attributes);
                return $fighter;

            case 'Thief':
                $fighter = new Thief();
                self::handleInstance($fighter, $attributes);
                return $fighter;
        }
    }

    private static function handleInstance(Fighter $fighter, array $attributes) : void
    {
        $fighter->name = $attributes['name'];
        $fighter->health = $attributes['health'];
        $fighter->strength = $attributes['strength'];
        $fighter->constitution = $attributes['constitution'];
        $fighter->agility = $attributes['agility'];
        $fighter->intelligence = $attributes['intelligence'];
        $fighter->webId = $attributes['id'];
    }

}