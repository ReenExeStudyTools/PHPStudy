<?php

namespace ReenExe\Study\OOP\DesignPattern\Decorator;

class MilkAdditional extends Additional
{
    public function getDescription(): string
    {
        return "{$this->object->getDescription()} with Milk";
    }

    public function getCost(): float
    {
        return $this->object->getCost() + 3;
    }
}