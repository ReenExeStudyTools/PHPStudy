<?php

namespace ReenExe\Study\OOP\ReturnType;

interface EntityFactory
{
    public static function create(): Entity;
}