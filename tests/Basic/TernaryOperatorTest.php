<?php

class TernaryOperatorTest extends \PHPUnit_Framework_TestCase
{
    public function testSingle()
    {
        $this->assertSame(1 > 0 ? 'a': 'b', 'a');
        $this->assertSame(2 < 3 && 3 < 5 ? 'a': 'b', 'a');
        $this->assertSame((2 < 3 && 3 < 5) ? 'a': 'b', 'a');
    }

    public function testShort()
    {
        $this->assertSame('a' ?: 'b', 'a');
        $this->assertSame('' ?: 'b', 'b');
    }

    public function testSequence()
    {
        $this->assertSame('a' ? 'a': 'b' ? 'b' : 'c', 'b');
        $this->assertSame('a' ? 'a': ('b' ? 'b' : 'c'), 'a');
    }

    public function testShortSequence()
    {
        $this->assertSame('a' ?: 'b' ?: 'c', 'a');
        $this->assertSame('' ?: 'b' ?: 'c', 'b');
        $this->assertSame('' ?: '' ?: 'c', 'c');
    }
}
