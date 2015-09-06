<?php

namespace ReenExe\Study\OOP\Magic;

class MagicTrueGetter
{
    public function __get($name)
    {
        return true;
    }
}