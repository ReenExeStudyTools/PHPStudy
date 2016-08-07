<?php

class IntvalTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertSame(intval(1), 1);
        $this->assertSame(intval('1'), 1);
        $this->assertSame(intval(' 1 '), 1);
        $this->assertSame(intval(' 1 '), 1);

        $this->assertSame(intval('11', 2), 3);
        $this->assertSame(intval('111', 2), 7);
        $this->assertSame(intval(' 111 ', 2), 7);

        $this->assertSame(intval('A', 16), 10);
        $this->assertSame(intval('B', 16), 11);
        $this->assertSame(intval('Z', 36), 35);

        $this->assertSame(intval('HELLO', 36), 29234652);
        $this->assertSame(intval('hello', 36), 29234652);

        $this->assertSame(intval(null), 0);
        $this->assertSame(intval(false), 0);
        $this->assertSame(intval([]), 0);
    }
}