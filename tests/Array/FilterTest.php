<?php

class FilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test(array $source, array $expected)
    {
        $this->assertTrue(array_filter($source) === $expected);
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
}