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
        /* @var $generator Generator */

        $both = function () {
            yield 1;
            return [1];
        };
        $generator = $both();
        foreach ($generator as $value) {
        }
        $this->assertSame($generator->getReturn(), [1]);

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

        /* @var $generator Generator */
        $generator = $both();
        foreach ($generator as $value) {
        }

        $this->assertSame($generator->getReturn(), null);

        /* @var $generator Generator */
        $generator = $both(false);
        foreach ($generator as $value) {
        }

        $this->assertSame($generator->getReturn(), [1]);
    }

    public function testFrom()
    {
        $from = function () {
            yield from [1, 2, 3];
            yield from [4, 5, 6];
            yield from [7, 8, 9];
        };

        $accumulator = [];
        foreach ($from() as $value) {
            $accumulator[] = $value;
        }

        $this->assertSame($accumulator, range(1, 9));
    }

    public function testSameKey()
    {
        $from = function () {
            yield 'key' => 1;
            yield 'key' => 2;
            yield 'key' => 3;
        };

        $result = [];
        foreach ($from() as $key => $value) {
            $result[] = [$key, $value];
        }

        $this->assertSame([['key', 1], ['key', 2], ['key', 3]], $result);
    }
}