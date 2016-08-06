<?php

use ReenExe\Study\OOP\StaticPropertyInstance;
use ReenExe\Study\OOP\SubStaticPropertyInstance;

class StaticPropertyInstanceTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertSame(StaticPropertyInstance::$property, 'StaticPropertyInstance');
        $this->assertSame(SubStaticPropertyInstance::$property, 'OverrideStaticPropertyInstance');

        $this->assertSame(StaticPropertyInstance::$property, 'StaticPropertyInstance');
    }
}