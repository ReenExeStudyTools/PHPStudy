<?php

class LoopTest extends \PHPUnit_Framework_TestCase
{
    public function testWhileList()
    {
        $array = ['x' => 'y'];

        while(list($key, $value) = each($array)) {
            $this->assertSame($key, 'x');
            $this->assertSame($value, 'y');
        }
    }
}