<?php

class YieldTest extends \PHPUnit_Framework_TestCase
{
    public function testRange()
    {
        $range = function($from, $to) {
            for ($from; $from <= $to; $from++) yield $from;
        };

        foreach ($range(1, 100) as $value);

        $this->assertSame($value, 100);
    }

    public function testPriority()
    {
        $both = function () {
            yield 1;
            return [1];
        };
        foreach ($both() as $value) {
        }

        $both = function () {
            return [1];
            yield 1;
        };
        foreach ($both() as $value) {
        }

        $both = function ($generatorBehavior = true) {
            if ($generatorBehavior) {
                yield 1;
            } else {
                return [1];
            }
        };
        foreach ($both() as $value) {
        }
    }
}