<?php

namespace ReenExe\Study\OOP\Override;


class StaticOverride
{
    public static function get($value)
    {
        return static::calculate($value);
    }

    protected static function calculate($value)
    {
        return $value;
    }
}