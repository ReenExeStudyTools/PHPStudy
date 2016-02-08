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
        foreach ([[], [4], [5]] as $length) {
            yield [
                'word',
                0,
                [],
                'word'
            ];
        }

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

        yield [
            'abc',
            1,
            [3],
            'bc'
        ];

        yield [
            'abc',
            3,
            [],
            false
        ];

        yield [
            'abcdef',
            -3,
            [],
            'def'
        ];

        yield [
            'abcdef',
            -6,
            [],
            'abcdef'
        ];

        yield [
            'abcdef',
            -6,
            [-3],
            'abc'
        ];

        yield [
            'abcdef',
            -3,
            [-1],
            'de'
        ];
    }
}
