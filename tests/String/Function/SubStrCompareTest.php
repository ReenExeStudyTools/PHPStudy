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
}
