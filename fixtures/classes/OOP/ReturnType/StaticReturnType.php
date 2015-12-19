<?php

namespace ReenExe\Study\OOP\ReturnType;

class StaticReturnType
{
    public static function getStaticInstance(): static
    {
        return new static();
    }
}
