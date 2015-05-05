<?php

class NumericTest extends \PHPUnit_Framework_TestCase
{
    public function testSet()
    {
        $decimal = 10;
        $octal = 012;
        $hex = 0xA;
        $binary = 0b1010;

        $this->assertTrue(
            ($decimal === $octal) && ($octal === $hex) && ($hex === $binary)
        );

        $this->assertTrue(7 === 07);
        $this->assertTrue(0b1 === 0B1);
        $this->assertTrue(0xA === 0XA);
    }

    public function testFloat()
    {
        $this->assertTrue(0.1 === .1);
        $this->assertTrue(-0.1 === -.1);
    }

    public function testExponential()
    {
        $this->assertTrue(1e1 === 1E1);
        $this->assertTrue(1.1e0 === 1.1);
    }
}