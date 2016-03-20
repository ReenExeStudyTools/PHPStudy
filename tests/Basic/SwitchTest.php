<?php

class SwitchTest extends \PHPUnit_Framework_TestCase
{
    public function testCompareEqual()
    {
        $callable = function ($value) {
            switch ($value) {
                case 1: return 'first';
            }
        };

        $this->assertSame($callable(1), 'first');
        $this->assertSame($callable(2), null);

        $callable = function ($value) {
            switch ($value) {
                case 1: return 'first';
                case '1': return 'second';
                case '2': return 'third';
            }
        };

        $this->assertSame($callable(1), 'first');
        $this->assertSame($callable('1'), 'first');
        $this->assertSame($callable(true), 'first');
        $this->assertSame($callable(2), 'third');
    }

    public function testArrayArgument()
    {
        $callable = function ($value) {
            switch ($value) {
                case ['1']: return [true];
            }
        };

        $this->assertSame($callable([1]), [true]);
    }

    public function testSubCondition()
    {
        $callable = function ($value) {
            switch (true) {
                case in_array($value, [1, 2, 3]): return 'first';
                case in_array($value, [5, 6, 7]): return 'second';
            }
        };

        $this->assertSame($callable(1), 'first');
        $this->assertSame($callable(7), 'second');
    }
}
