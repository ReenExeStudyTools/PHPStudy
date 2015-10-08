<?php

namespace ReenExe\Study\OOP\DesignPattern\Decorator;

class LimeAdditional extends Additional
{
    public function getDescription(): string
    {
        return "{$this->object->getDescription()} with Lime";
    }

    public function getCost(): float
    {
        return $this->object->getCost() + 2;
    }
}