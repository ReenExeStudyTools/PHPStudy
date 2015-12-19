<?php

use ReenExe\Study\OOP\ReturnType\StaticReturnType;

class StaticReturnTypeTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        /**
         * ERROR:
         * PHP Parse error:  syntax error, unexpected 'static'

            $this->assertInstanceOf(StaticReturnType::class, StaticReturnType::getStaticInstance());
         */
    }
}
