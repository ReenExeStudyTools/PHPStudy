<?php

class BinaryTest extends \PHPUnit_Framework_TestCase
{
    public function testOR()
    {
        for ($i = 0; $i < 10; ++$i) {
            $this->assertTrue(($i | $i) === $i);
        }

        $this->assertTrue((1 | 0) === 1);
        $this->assertTrue((0b1 | 0b0) === 0b1);

        $this->assertTrue((1 | 2) === 3);
        $this->assertTrue((0b1 | 0b10) === 0b11);

        $this->assertTrue((1 | 2 | 4) === 7);
        $this->assertTrue((0b1 | 0b10 | 0b100) === 0b111);

        $this->assertTrue((1 | 2 | 3 | 4) === 7);
        $this->assertTrue((0b1 | 0b10 | 0b11 | 0b100) === 0b111);
    }

    public function testAND()
    {
        for ($i = 0; $i < 10; ++$i) {
            $this->assertTrue(($i & $i) === $i);
        }

        $this->assertTrue((1 & 0) === 0);
        $this->assertTrue((0b1 & 0b0) === 0b0);

        $this->assertTrue((1 & 2) === 0);
        $this->assertTrue((0b1 & 0b10) === 0b0);

        $this->assertTrue((1 & 3) === 1);
        $this->assertTrue((0b1 & 0b11) === 0b1);

        $this->assertTrue((1 & 2 & 4) === 0);
        $this->assertTrue((0b1 & 0b10 & 0b100) === 0b0);

        $this->assertTrue((1 & 2 & 3 & 4) === 0b0);
        $this->assertTrue((0b1 & 0b10 & 0b11 & 0b100) === 0b0);
    }

    public function testXOR()
    {
        for ($i = 0; $i < 10; ++$i) {
            // simple
            $this->assertTrue(($i ^ $i) === 0);

            // recovery

            for ($j = 0; $j < 10; ++$j) {
                $this->assertTrue(($i ^ $j ^ $j) === $i);
            }
        }

        $this->assertTrue((1 ^ 0) === 1);
        $this->assertTrue((0b1 ^ 0b0) === 0b1);

        $this->assertTrue((1 ^ 2) === 3);
        $this->assertTrue((0b1 ^ 0b10) === 0b11);

        $this->assertTrue((1 ^ 3) === 2);
        $this->assertTrue((0b01 ^ 0b11) === 0b10);

        $this->assertTrue((1 ^ 2 ^ 4) === 7);
        $this->assertTrue((0b1 ^ 0b10 ^ 0b100) === 0b111);

        $this->assertTrue((1 ^ 2 ^ 3 ^ 4) === 0b100);
        $this->assertTrue((0b1 ^ 0b10 ^ 0b11 ^ 0b100) === 0b100);
    }
}