<?php

use ReenExe\Study\IteratorClass;
use ReenExe\Study\IteratorAggregateClass;
use ReenExe\Study\BrokenIteratorAggregateClass;
use ReenExe\Study\MultiIteratorClass;

class IteratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param array $source
     * @param array $expect
     */
    public function testIteratorInterface(array $source, array $expect)
    {
        $this->assertIterate($expect, new IteratorClass($source));
    }

    /**
     * @dataProvider dataProvider
     * @param array $source
     * @param array $expect
     */
    public function testIteratorAggregateInterface(array $source, array $expect)
    {
        $this->assertIterate($expect, new IteratorAggregateClass($source));
    }

    public function testBrokenIteratorAggregate()
    {
        $iterator = new BrokenIteratorAggregateClass([]);

        $this->setExpectedException(\Exception::class, 'Objects returned by ReenExe\Study\BrokenIteratorAggregateClass::getIterator() must be traversable or implement interface Iterator');
        foreach ($iterator as $k => $v) {

        }
    }

    public function testPriority()
    {
        /**
         * Fatal error:
         * Class ReenExe\Study\MultiIteratorClass cannot implement both IteratorAggregate and Iterator at the same time

           $simple = [1];
           $aggregate = [2];
           $iterator = new MultiIteratorClass($simple, $aggregate);

         */
    }

    public function testEmptyIterator()
    {
        $this->assertIterate([], new \EmptyIterator());
    }

    public function testArrayIterator()
    {
        $expect = [
            'a' => 3,
            'c' => 7,
        ];
        $iterator = new \ArrayIterator($expect);

        $this->assertIterate($expect, $iterator);
        $this->assertIterate($expect, $iterator);

        $this->assertSame($expect, $iterator->getArrayCopy());
    }

    /**
     * TODO: why?
     */
    public function testNoRewindIterator()
    {
        $source = range(1, 11);
        $iterator = new \NoRewindIterator(new \ArrayIterator($source));

        $expect = [1];
        $actual = [];
        foreach ($iterator as $value) {
            $actual[] = $value;
            break;
        }

        $this->assertSame($expect, $actual);

        $expect = [1];
        $actual = [];
        foreach ($iterator as $value) {
            $actual[] = $value;
            break;
        }
        $this->assertSame($expect, $actual);
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

    private function assertIterate(array $expect, \Traversable $iterator)
    {
        $accumulator = [];

        foreach ($iterator as $k => $v) {
            $accumulator[$k] = $v;
        }

        $this->assertSame($expect, $accumulator);
    }
}
