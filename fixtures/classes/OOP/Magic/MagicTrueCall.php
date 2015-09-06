<?php

namespace ReenExe\Study\OOP\Magic;

class MagicTrueCall
{
    public function __call($name, array $args)
    {
        return true;
    }
}