<?php

use ReenExe\Study\OOP\ReturnType\SelfReturnType;
use ReenExe\Study\OOP\ReturnType\ExtendSelfReturnType;

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

    public function testExtendStaticMethod()
    {
        $this->assertInstanceOf(SelfReturnType::class, ExtendSelfReturnType::getInstance());
    }

    public function testExtendInstanceMethod()
    {
        $instance = new ExtendSelfReturnType();

        $this->assertInstanceOf(ExtendSelfReturnType::class, $instance->getThis());
    }
}
