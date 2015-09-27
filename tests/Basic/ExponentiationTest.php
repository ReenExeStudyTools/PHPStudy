<?php

class ExponentiationTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertSame(2 ** 1, 2);
        $this->assertSame(2 ** 3, 8);
        $this->assertSame(2 ** 10, 1024);

        $this->assertSame(2 ** (2 ** 3), 256);
        $this->assertSame(2 ** 2 ** 3, 256);
    }
}