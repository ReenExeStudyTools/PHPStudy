<?php

use ReenExe\Study\OOP\PropertyInstanceClass;

class PropertyInstanceTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        try {
            new PropertyInstanceClass();
        } catch (\Throwable $e) {

        }
    }
}