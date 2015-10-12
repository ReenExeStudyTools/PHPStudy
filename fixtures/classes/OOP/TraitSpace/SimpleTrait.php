<?php

namespace ReenExe\Study\OOP\TraitSpace;

trait SimpleTrait
{
    private $value;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}