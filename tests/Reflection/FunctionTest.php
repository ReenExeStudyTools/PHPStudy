<?php

namespace Tests;

use ReenExe\Study\OOP\Override\SubSimple;
use ReenExe\Study\OOP\Override\Simple;

class FunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testGetClass()
    {
        $this->assertSame(FunctionTest::class, get_class());

        $this->assertSame(FunctionTest::class, get_class($this));
    }

    public function testIsSubClassOf()
    {
        $this->assertTrue(is_subclass_of(SubSimple::class, Simple::class));
        $subClass = new SubSimple();
        $this->assertTrue(is_subclass_of($subClass, Simple::class));

        $this->assertFalse(is_subclass_of(Simple::class, SubSimple::class));
    }

    public function testGetParentClass()
    {
        $this->assertSame(Simple::class, get_parent_class(SubSimple::class));
    }
}
