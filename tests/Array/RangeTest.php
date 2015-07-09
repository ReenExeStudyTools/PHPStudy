<?php

class RangeTest extends \PHPUnit_Framework_TestCase
{
    public function testAll()
    {
        $this->assertTrue(range(1, 3) === [1, 2, 3]);
        $this->assertTrue(range(1, 9, 2) === [1, 3, 5, 7, 9]);
        $this->assertTrue(range(1.5, 7, 2) === [1.5, 3.5, 5.5]);
        $this->assertTrue(range(2.5, 7, 2.5) === [2.5, 5.0]);
        $this->assertTrue(range('1', '3') === [1, 2, 3]);
        $this->assertTrue(range('a', 'c') === ['a', 'b', 'c']);
        $this->assertTrue(range('a', 'c', 2) === ['a', 'c']);
    }
}