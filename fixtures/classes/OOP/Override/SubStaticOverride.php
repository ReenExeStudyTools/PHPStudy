<?php

namespace ReenExe\Study\OOP\Override;


class SubStaticOverride extends StaticOverride
{
    protected static function calculate($value)
    {
        return str_repeat($value, 3);
    }
}