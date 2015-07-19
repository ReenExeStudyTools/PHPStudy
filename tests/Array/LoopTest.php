<?php

class LoopTest extends \PHPUnit_Framework_TestCase
{
    public function testWhileList()
    {
        $array = ['x' => 'y'];

        while(list($key, $value) = each($array)) {
            $this->assertSame($key, 'x');
            $this->assertSame($value, 'y');
        }
    }

    public function testForeach()
    {
        $array = ['x' => 'y'];

        foreach ($array as $key => $value) {
            $this->assertSame($key, 'x');
            $this->assertSame($value, 'y');
        }
    }

    public function testForeachList()
    {
        $array = ['a' => ['x', 'y', 'z']];

        foreach ($array as $key => list($x, $y, $z)) {
            $this->assertSame($key, 'a');
            $this->assertSame($x, 'x');
            $this->assertSame($y, 'y');
            $this->assertSame($z, 'z');
        }
    }
}