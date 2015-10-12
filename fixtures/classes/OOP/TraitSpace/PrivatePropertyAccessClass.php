<?php

namespace ReenExe\Study\OOP\TraitSpace;

class PrivatePropertyAccessClass
{
    use PrivatePropertyAccessTrait;

    public function getTraitPrivateValue()
    {
        return $this->value;
    }
}
