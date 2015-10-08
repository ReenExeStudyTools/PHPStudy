<?php

namespace ReenExe\Study\OOP\DesignPattern\Decorator;

class Tee implements DrinkInterface
{
    public function getDescription(): string
    {
        return 'Tee';
    }

    public function getCost(): float
    {
        return 100;
    }
}