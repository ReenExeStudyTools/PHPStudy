<?php

namespace ReenExe\Study\OOP\ReturnType;

class OverrideResultFactory
{
    public static function createResponsibleEntity():Entity
    {
        return new ResponsibleEntity();
    }

    public static function createEntity():ResponsibleEntity
    {
        return new Entity();
    }
}
