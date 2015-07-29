<?php

class FunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testMerge()
    {
        // can merge one params
        $this->assertTrue(array_merge([1]) === [1]);
        // flush numeric keys
        $this->assertTrue(array_merge([1 => 1]) === [1]);
        // stay assoc keys
        $this->assertTrue(array_merge(['k' => 'v']) === ['k' => 'v']);
        $this->assertTrue(array_merge([1], [2]) === [1, 2]);
        $this->assertTrue(array_merge(['x'], ['y'], ['z']) === ['x', 'y', 'z']);
        // flush numeric keys
        $this->assertTrue(
            array_merge([1 => 'a'], [2 => 'b'], [3 => 'c']) === ['a', 'b', 'c']
        );
    }
}