<?php

namespace ReenExe\Study\OOP\TraitSpace;

trait SimpleTrait
{
    private $traitValue;

    public function getTraitValue()
    {
        return $this->traitValue;
    }

    public function setTraitValue($value)
    {
        $this->traitValue = $value;
    }
}