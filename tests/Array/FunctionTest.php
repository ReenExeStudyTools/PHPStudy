<?php

class FunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testMerge()
    {
        $this->assertTrue(array_merge([1], [2]) === [1, 2]);
        $this->assertTrue(array_merge(['x'], ['y'], ['z']) === ['x', 'y', 'z']);
        // flush keys
        $this->assertTrue(
            array_merge([1 => 'a'], [2 => 'b'], [3 => 'c']) === ['a', 'b', 'c']
        );
    }
}