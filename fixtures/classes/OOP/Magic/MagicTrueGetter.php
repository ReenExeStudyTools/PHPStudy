<?php

namespace ReenExe\Study\OOP\Magic;

class MagicTrueGetter
{
    public function __get($value)
    {
        return true;
    }
}