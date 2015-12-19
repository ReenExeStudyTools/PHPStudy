<?php

namespace ReenExe\Study\OOP\ReturnType;

class OverrideResultFactory
{
    public static function createResponsibleEntity():Entity
    {
        return new ResponsibleEntity();
    }
}