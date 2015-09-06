<?php

use ReenExe\Study\OOP\Override\StaticOverride;
use ReenExe\Study\OOP\Override\SubStaticOverride;

class StaticOverrideTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertTrue(StaticOverride::get('v') === 'v');
        $this->assertTrue(SubStaticOverride::get('v') === 'vvv');
    }
}