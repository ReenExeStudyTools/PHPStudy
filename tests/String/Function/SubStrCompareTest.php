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
            null,
            0,
        ];
    }
}
