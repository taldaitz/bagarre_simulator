<?php

use Dawan\BagarreSimulator\Builder\ArthurBuilder;
use Dawan\BagarreSimulator\Builder\ConanBuilder;
use Dawan\BagarreSimulator\Builder\MerlinBuilder;
use Dawan\BagarreSimulator\Characters\Protection;
use Dawan\BagarreSimulator\Characters\Warrior;
use Dawan\BagarreSimulator\Characters\Weapon;
use PHPUnit\Framework\TestCase;

class FighterTest extends TestCase
{
    public function testWarriorIntance() : void
    {
        //Arrange
        $fighter = new Warrior();

        //Act
        $job = $fighter->getJob();

        //Assert
        $this->assertSame('Guerrier', $job);
    }

    public function testArthurBuilder() : void
    {
        //Arrange
        $arturBuilder = new ArthurBuilder();

        //ACT
        $fighter = $arturBuilder->build();

        //Assert
        $this->assertEquals(10, $fighter->strength);
        $this->assertEquals(13, $fighter->constitution);
        $this->assertEquals('Arthur', $fighter->name);
    }

    public function testGetAttack() : void
    {
        $conan = (new ConanBuilder())->build();

        $attack = $conan->getAttack();
        $expected = round($conan->strength * 1.5);

        $this->assertEquals($expected, $attack);
    }

    public function testGetAttackWithWeapon() : void
    {
        $conan = (new ConanBuilder())->build();

        $sword = new Weapon();
        $sword->type = 'sword';
        $sword->attack = 15;

        $conan->weapon = $sword;

        $attack = $conan->getAttack();
        $expected = round($conan->strength * 1.5) + $sword->attack;

        $this->assertEquals($expected, $attack);
    }

    public function testGetDefense() : void
    {
        $conan = (new ConanBuilder())->build();

        $defense = $conan->getDefense();
        $expected = round($conan->constitution / 2);
 
        $this->assertEquals($expected, $defense);
    }

    public function testGetDefenseWithProtection() : void
    {
        $conan = (new ConanBuilder())->build();

        $shield = new Protection();
        $shield->defense = 20;

        $conan->protection = $shield;

        $defense = $conan->getDefense();
        $expected = round($conan->constitution / 2) + $shield->defense;

        $this->assertEquals($expected, $defense);
    }

    public function testGetRessources() : void
    {
        $warrior = (new ConanBuilder())->build();
        $wizard = (new MerlinBuilder())->build();

        $warriorRessources = $warrior->getRessources();
        $wizardRessources = $wizard->getRessources();

        $this->assertArrayHasKey('PV', $warriorRessources);
        $this->assertArrayHasKey('PV', $wizardRessources);
        $this->assertArrayHasKey('Mana', $wizardRessources);
    }
}