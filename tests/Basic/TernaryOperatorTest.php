<?php

class TernaryOperatorTest extends \PHPUnit_Framework_TestCase
{
    public function testSingle()
    {
        $this->assertSame(1 > 0 ? 'a': 'b', 'a');
        $this->assertSame(2 < 3 && 3 < 5 ? 'a': 'b', 'a');
        $this->assertSame((2 < 3 && 3 < 5) ? 'a': 'b', 'a');
    }
}
