<?php

namespace ReenExe\Study\OOP\Magic;

class MagicStringGetter
{
    public function __get($name)
    {
        return $name;
    }
}