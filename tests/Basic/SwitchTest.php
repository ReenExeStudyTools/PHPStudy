<?php

class SwitchTest extends \PHPUnit_Framework_TestCase
{
    public function testCompareEqual()
    {
        $callable = function ($value) {
            switch ($value) {
                case 1: return 1;
            }
        };

        $this->assertSame($callable(1), 1);

        $callable = function ($value) {
            switch ($value) {
                case 1: return 1;
                case '1': return '1';
            }
        };

        $this->assertSame($callable(1), 1);
        $this->assertSame($callable('1'), 1);
        $this->assertSame($callable(true), 1);
    }
}
