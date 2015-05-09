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
        /**
         * Такое запрещено делать
         * Результат:
         *  `Fatal error: Generators cannot return values using "return"`

            1.
                $both = function() {
                    yield 1;
                    return [1];
                };

            2.
                $both = function() {
                    return [1];
                    yield 1;
                };

            3.
                $both = function($generatorBehavior = true) {
                    if ($generatorBehavior) {
                        yield 1;
                    } else {
                        return [1];
                    }
                };

            Action:
                foreach ($both() as $value) {}
         */
    }
}