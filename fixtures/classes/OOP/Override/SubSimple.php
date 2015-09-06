<?php

namespace ReenExe\Study\OOP\Override;

class SubSimple extends Simple
{
    protected function calculate($value)
    {
        return $value . $value;
    }
}