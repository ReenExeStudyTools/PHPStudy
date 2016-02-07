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

    public function testExceptionConverted()
    {
        $this->assertSame((int) NAN, 0);
        $this->assertSame((int) INF, 0);
        $this->assertSame((int) -INF, 0);
    }

    public function testNAN()
    {
        $this->assertFalse(NAN === NAN);
    }

    public function testConverted()
    {
        $result = (0.1 + 0.7) * 10;
        $this->assertTrue((7 < $result) && ($result < 8));
    }

    public function testFloatDifferent()
    {
        $source = 2326.97;

        $value = 100 * $source;

        $this->assertSame((int)$value, 232696);
        $this->assertSame((string)$value, '232697');
        $this->assertSame((int)(string)$value, 232697);
    }
}