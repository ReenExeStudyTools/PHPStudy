<?php

use ReenExe\Study\StaticVariableClass;

class StaticVariableClassTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $a = new StaticVariableClass();
        $b = new StaticVariableClass();

        $this->assertFalse($a === $b);

        $a->property = 1;
        $b->property = 2;

        $a::$staticProperty = 3;
        $b::$staticProperty = 5;

        $this->assertSame($a->property, 1);
        $this->assertSame($b->property, 2);

        $this->assertSame($a::$staticProperty, 5);
        $this->assertSame($b::$staticProperty, 5);
    }
}