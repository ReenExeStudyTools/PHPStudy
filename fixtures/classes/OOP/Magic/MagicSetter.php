<?php

namespace ReenExe\Study\OOP\Magic;

class MagicSetter
{
    public function __set($name, $value)
    {
        return null;
    }
}