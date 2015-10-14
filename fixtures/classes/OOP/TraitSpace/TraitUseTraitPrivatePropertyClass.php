<?php

namespace ReenExe\Study\OOP\TraitSpace;

class TraitUseTraitPrivatePropertyClass
{
    use TraitUseTrait;

    public function getParentTraitPrivateProperty()
    {
        return $this->value;
    }
}