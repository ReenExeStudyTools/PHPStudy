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

        $this->assertFalse(each($array));
    }

    public function testForeach()
    {
        $array = ['x' => 'y'];

        foreach ($array as $key => $value) {
            $this->assertSame($key, 'x');
            $this->assertSame($value, 'y');
        }
    }

    public function testForeachReference()
    {
        $array = [1, 2, 3];

        foreach ($array as &$value) {
            $value += 1;
        }

        $this->assertSame($array, [2, 3, 4]);

        foreach ($array as $value) {
            break;
        }

        $this->assertSame($array, [2, 3, 2]);

        foreach ($array as $value) {
            if ($value === 3) break;;
        }

        $this->assertSame($array, [2, 3, 3]);
    }

    public function testForeachSaveReference()
    {
        $array = [1, 2, 3];

        foreach ($array as &$value) {
            $value += 1;
        }
        // remove reference
        unset($value);

        $expect = [2, 3, 4];

        $this->assertSame($array, $expect);

        foreach ($array as $value) {
            break;
        }

        $this->assertSame($array, $expect);

        foreach ($array as $value) {
            if ($value === 3) break;;
        }

        $this->assertSame($array, $expect);
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

    public function testFor()
    {
        // simple
        for ($i = 1; $i < 3; $i++) {}
        $this->assertTrue($i === 3);

        // simple with empty body
        for ($i = 1; $i < 5; $i++);
        $this->assertTrue($i === 5);

        // multi
        for ($i = 1, $j = 1; $i < 10, $j < 10; $i++, $j++) {}
        $this->assertTrue($i === 10);
        $this->assertTrue($j === 10);

        // condition
        for ($i = 1, $j = 1; $i < 5 && $j < 5; $i++, $j++) {}
        $this->assertTrue($i === 5);
        $this->assertTrue($j === 5);

        // where calculate increment
        for ($i = 5; $i < 6; $i += $increment) {
            $increment = $i;
        }
        $this->assertTrue($i === 10);

        // pseudo infinity
        for (;;) {
            if (true) {
                break;
            }
        }

        // while
        $array = ['x' => 'y'];
        for (; list($key, $value) = each($array);) {
            $this->assertTrue($key === 'x');
            $this->assertTrue($value === 'y');
        }

        // for fun
        for (list($start, $offset, $end) = [1, 2, 3]; $start < $end; $start += $offset) {}
    }
}