<?php

namespace ReenExe\Study\OOP\DesignPattern\Decorator;

interface DrinkInterface
{
    public function getDescription(): string;

    public function getCost(): float;
}