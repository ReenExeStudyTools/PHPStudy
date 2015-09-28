<?php

namespace ReenExe\Study\OOP\Magic;

class MagicTrueCall
{
    public function __call($name, array $args)
    {
        return true;
    }

    public static function __callStatic($name, array $args)
    {
        $callable = array_shift($args);
        if (is_callable($callable)) {
            return $callable(...$args);
        }
    }
}