<?php

class SplitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $string
     * @param $length
     * @param $expected
     */
    public function test(string $string, $length, $expected)
    {
        $this->assertSame(str_split($string, $length), $expected);
    }

    public function dataProvider()
    {
        yield [
            'abc',
            1,
            ['a', 'b', 'c']
        ];

        yield [
            'abc',
            2,
            ['ab', 'c']
        ];

        yield [
            'abc',
            3,
            ['abc']
        ];

        yield [
            'abc',
            5,
            ['abc']
        ];
    }
}