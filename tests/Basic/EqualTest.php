<?php

namespace ReenExe\Study\Test\Basic;

class EqualTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertTrue('1' == '01');
        $this->assertTrue(1 == '01');
        $this->assertTrue(1 == '1');
        $this->assertTrue(true == '1');
        $this->assertTrue(true == 1);
    }
}