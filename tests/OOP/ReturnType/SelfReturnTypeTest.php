<?php

use ReenExe\Study\OOP\ReturnType\SelfReturnType;

class SelfReturnTypeTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertInstanceOf(SelfReturnType::class, SelfReturnType::getInstance());
    }
}
