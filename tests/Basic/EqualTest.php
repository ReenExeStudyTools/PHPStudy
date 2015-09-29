<?php

namespace ReenExe\Study\Test\Basic;

class EqualTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertTrue('1' == '01');
        $this->assertTrue(1 == '01');
        $this->assertTrue('01' == '001');
        $this->assertTrue('01e3' == '001e3');
        $this->assertTrue(1 == '1');
        $this->assertTrue(true == '1');
        $this->assertTrue(true == 1);

        $this->assertTrue(01 === 000001);
        $this->assertTrue(0b1 === 0b00001);
        $this->assertTrue(0x1 === 0x00001);

        $this->assertTrue(0 === -0);
    }
}
