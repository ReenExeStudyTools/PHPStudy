<?php

namespace ReenExe\Study\OOP\Override;

class Simple
{
    public function get($value)
    {
        return $this->calculate($value);
    }

    protected function calculate($value)
    {
        return $value;
    }
}