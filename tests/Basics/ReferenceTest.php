<?php

class ReferenceTest extends \PHPUnit_Framework_TestCase
{
    public function testLink()
    {
        $a = 1;
        $b = &$a;

        $b = 2;
        $this->assertSame($a, 2);

        $c = &$b;

        $c = 3;
        $this->assertSame($a, 3);
    }
}