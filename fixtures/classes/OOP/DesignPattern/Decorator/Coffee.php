<?php

namespace ReenExe\Study\OOP\DesignPattern\Decorator;

class Coffee implements DrinkInterface
{
    public function getDescription(): string
    {
        return 'Coffee';
    }

    public function getCost(): float
    {
        return 5;
    }
}