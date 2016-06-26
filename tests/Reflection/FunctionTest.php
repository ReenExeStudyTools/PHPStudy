<?php

namespace Tests;

class FunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testGetClass()
    {
        $this->assertSame(FunctionTest::class, get_class());

        $this->assertSame(FunctionTest::class, get_class($this));
    }
}
