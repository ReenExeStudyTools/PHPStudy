<?php

class SubStrTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider  dataProvider
     * @param $string
     * @param $start
     * @param $length
     * @param $expect
     */
    public function test($string, $start, $length, $expect)
    {
        $this->assertSame(substr($string, $start, ...$length), $expect);
    }

    public function dataProvider()
    {
        yield [
            'word',
            0,
            [],
            'word'
        ];

        yield [
            'word',
            0,
            [4],
            'word'
        ];

        yield [
            'word',
            0,
            [5],
            'word'
        ];

        yield [
            'abc',
            0,
            [1],
            'a'
        ];

        yield [
            'abc',
            0,
            [2],
            'ab'
        ];

        yield [
            'abc',
            1,
            [2],
            'bc'
        ];
    }
}
