<?php

namespace ReenExe\Study\OOP\ReturnType;

class SelfReturnType
{
    public static function getInstance(): self
    {
        return new self();
    }
}
