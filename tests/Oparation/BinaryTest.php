<?php

class BinaryTest extends \PHPUnit_Framework_TestCase
{
    public function testOR()
    {
        for ($i = 0; $i < 10; ++$i) {
            $this->assertTrue(($i | $i) === $i);
        }

        $this->assertTrue((1 | 0) === 1);
        $this->assertTrue((0b1 | 0b1) === 1);

        $this->assertTrue((1 | 2) === 3);
        $this->assertTrue((0b1 | 0b11) === 0b11);

        $this->assertTrue((1 | 2 | 4) === 7);
        $this->assertTrue((0b1 | 0b10 | 0b100) === 0b111);

        $this->assertTrue((1 | 2 | 3 | 4) === 7);
        $this->assertTrue((0b1 | 0b10 | 0b11 | 0b100) === 0b111);
    }
}