<?php

namespace ReenExe\Study\OOP\DesignPattern\Decorator;

abstract class Additional implements DrinkInterface
{
    protected $object;

    public function __construct(DrinkInterface $object)
    {
        $this->object = $object;
    }
}