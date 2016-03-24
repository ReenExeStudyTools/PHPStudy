<?php

use ReenExe\Study\IteratorClass;
use ReenExe\Study\IteratorAggregateClass;
use ReenExe\Study\BrokenIteratorAggregateClass;

class IteratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param array $source
     * @param array $expect
     */
    public function testIteratorInterface(array $source, array $expect)
    {
        $iterator = new IteratorClass($source);

        $accumulator = [];

        foreach ($iterator as $k => $v) {
            $accumulator[$k] = $v;
        }

        $this->assertSame($expect, $accumulator);
    }

    /**
     * @dataProvider dataProvider
     * @param array $source
     * @param array $expect
     */
    public function testIteratorAggregateInterface(array $source, array $expect)
    {
        $iterator = new IteratorAggregateClass($source);

        $accumulator = [];

        foreach ($iterator as $k => $v) {
            $accumulator[$k] = $v;
        }

        $this->assertSame($expect, $accumulator);
    }

    public function testBrokenIteratorAggregate()
    {
        $iterator = new BrokenIteratorAggregateClass([]);

        $this->setExpectedException(\Exception::class, 'Objects returned by ReenExe\Study\BrokenIteratorAggregateClass::getIterator() must be traversable or implement interface Iterator');
        foreach ($iterator as $k => $v) {

        }
    }

    public function dataProvider()
    {
        yield [
            [],
            []
        ];

        yield [
            ['a' => 1, 'b' => 7],
            [1, 7]
        ];
    }
}
