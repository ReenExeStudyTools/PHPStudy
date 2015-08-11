<?php

class FilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test(array $source, array $expected)
    {
        $this->assertTrue(array_filter($source) === $expected);
        $this->assertTrue(array_filter($source, 'boolval') === $expected);
    }

    public function dataProvider()
    {
        return [
            [
                [], []
            ],
            [
                [1, true, 'value'], [1, true, 'value']
            ],
            [
                [false, 0, null, '', '0', []], []
            ],
            [
                [false, 1 => 1], [1 => 1]
            ],
        ];
    }

    /**
     * @dataProvider callbackDataProvider
     */
    public function testCallback(array $source, array $expected, $callback)
    {
        $this->assertTrue(array_filter($source, $callback) === $expected);
    }

    public function callbackDataProvider()
    {
        $list = ['intval', 'is_int', 'is_numeric'];

        foreach ($list as $callback) {
            yield [
                ['a', 'b', 'c', 1, 2, 3],
                [3 => 1, 4 => 2, 5 => 3],
                $callback
            ];
        }
    }
}