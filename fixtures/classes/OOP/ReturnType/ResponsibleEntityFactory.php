<?php

namespace ReenExe\Study\OOP\ReturnType;

class ResponsibleEntityFactory implements EntityFactory
{
    public static function create(): ResponsibleEntity
    {
        return new ResponsibleEntity();
    }
}
