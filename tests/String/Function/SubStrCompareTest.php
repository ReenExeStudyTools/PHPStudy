<?php

class SubStrCompareTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider defaultDataProvider
     * @param $mainString
     * @param $string
     * @param $offset
     * @param $expected
     */
    public function testDefault($mainString, $string, $offset, $expected)
    {
        $this->assertSame($expected, substr_compare($mainString, $string, $offset));
    }

    public function defaultDataProvider()
    {
        yield [
            'abc',
            'abc',
            0,
            0
        ];

        yield [
            'abc',
            'bc',
            1,
            0
        ];

        yield [
            'bcd',
            'bcd',
            0,
            0
        ];

        yield [
            'bcd',
            'c',
            0,
            -1
        ];

        yield [
            'bcd',
            'a',
            0,
            1
        ];
    }

    /**
     * @dataProvider lengthDataProvider
     * @param $mainString
     * @param $string
     * @param $offset
     * @param $length
     * @param $expected
     */
    public function testLength($mainString, $string, $offset, $length, $expected)
    {
        $this->assertSame($expected, substr_compare($mainString, $string, $offset, $length));
    }

    public function lengthDataProvider()
    {
        yield [
            'ac',
            'ab',
            0,
            1,
            0
        ];

        yield [
            'ac',
            'ab',
            0,
            2,
            1
        ];

        yield [
            'ab',
            'ac',
            0,
            2,
            -1
        ];

        yield [
            'some text ab',
            'ac',
            10,
            2,
            -1
        ];

        yield [
            'some text ab',
            'ac',
            10,
            1,
            0
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param $mainString
     * @param $string
     * @param $offset
     * @param $length
     * @param $caseInsensitivity
     * @param $expected
     */
    public function test($mainString, $string, $offset, $length, $caseInsensitivity, $expected)
    {
        $this->assertSame($expected, substr_compare($mainString, $string, $offset, $length, $caseInsensitivity));
    }

    public function dataProvider()
    {
        yield [
            'abc',
            'abc',
            0,
            3,
            false,
            0,
        ];

        yield [
            'abc',
            'abc',
            0,
            3,
            true,
            0,
        ];

        yield [
            'abc',
            'ABC',
            0,
            3,
            true,
            0,
        ];

        yield [
            'abc',
            'ABC',
            0,
            3,
            false,
            1,
        ];

        yield [
            'ABC',
            'abc',
            0,
            3,
            false,
            -1,
        ];
    }
}
