<?php

class ArithmeticTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $this->assertTrue(1 + 1 === 2);
        $this->assertTrue(3+ -1 === 2);
        $this->assertTrue(3 + -1 === 2);
    }

    public function testSub()
    {
        $this->assertTrue(3- +1 === 2);
        $this->assertTrue(3- + 1 === 2);
        $this->assertTrue(3 - +1 === 2);
        $this->assertTrue(3 - + 1 === 2);
        $this->assertTrue(1 - - 1 === 2);
    }

    public function testError()
    {
        // have error
//         1++1 === 2;
//         1--1 === 2;
    }
}