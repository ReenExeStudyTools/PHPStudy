<?php

use ReenExe\Study\OOP\ReturnType\SelfReturnType;

class SelfReturnTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testStaticMethod()
    {
        $this->assertInstanceOf(SelfReturnType::class, SelfReturnType::getInstance());
    }

    public function testInstanceMethod()
    {
        $instance = new SelfReturnType();

        $this->assertInstanceOf(SelfReturnType::class, $instance->getThis());
    }
}
