<?php

namespace ReenExe\Study;

class MethodStaticVariableClass
{
    public function setAndGet($value = false)
    {
        static $init;

        if ($value) {
            $init = $value;
        } else {
            return $init;
        }
    }
}