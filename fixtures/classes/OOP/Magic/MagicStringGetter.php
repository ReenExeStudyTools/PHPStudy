<?php

namespace ReenExe\Study\OOP\Magic;

class MagicStringGetter
{
    public function __get($value)
    {
        return $value;
    }
}