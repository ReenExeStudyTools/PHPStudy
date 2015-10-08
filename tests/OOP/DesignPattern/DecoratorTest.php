<?php

use ReenExe\Study\OOP\DesignPattern\Decorator\Tee;
use ReenExe\Study\OOP\DesignPattern\Decorator\Coffee;
use ReenExe\Study\OOP\DesignPattern\Decorator\LimeAdditional;
use ReenExe\Study\OOP\DesignPattern\Decorator\MilkAdditional;

class DecoratorTest extends \PHPUnit_Framework_TestCase
{
    public function testCoffee()
    {
        $coffee = new Coffee();

        $this->assertSame($coffee->getDescription(), 'Coffee');
        $this->assertSame($coffee->getCost(), 5.0);
    }

    public function testTee()
    {
        $tee = new Tee();

        $teeWithLime = new LimeAdditional($tee);
        $this->assertSame($teeWithLime->getDescription(), 'Tee with Lime');
        $this->assertSame($teeWithLime->getCost(), 102.0);

        $teeWithLimeWithLime = new LimeAdditional($teeWithLime);
        $this->assertSame($teeWithLimeWithLime->getDescription(), 'Tee with Lime with Lime');
        $this->assertSame($teeWithLimeWithLime->getCost(), 104.0);

        $teeWithLimeWithMilk = new MilkAdditional($teeWithLime);
        $this->assertSame($teeWithLimeWithMilk->getDescription(), 'Tee with Lime with Milk');
        $this->assertSame($teeWithLimeWithMilk->getCost(), 105.0);
    }
}