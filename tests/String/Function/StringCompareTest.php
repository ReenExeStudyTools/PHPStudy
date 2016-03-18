<?php

class StringCompareTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider caseSensitiveDataProvider
     * @param $left
     * @param $right
     * @param $expected
     */
    public function test($left, $right, $expected)
    {
        $this->assertSame($expected, strcmp($left, $right));
    }

    /**
     * @dataProvider caseInsensitiveDataProvider
     * @param $left
     * @param $right
     * @param $expected
     */
    public function testCase($left, $right, $expected)
    {
        $this->assertSame($expected, strcasecmp($left, $right));
    }

    public function caseSensitiveDataProvider()
    {
        yield from $this->dataProvider();

        yield [
            'a',
            'A',
            1
        ];
    }

    public function caseInsensitiveDataProvider()
    {
        yield from $this->dataProvider();

        yield [
            'a',
            'A',
            0
        ];
    }

    private function dataProvider()
    {
        yield [
            'a',
            'a',
            0
        ];

        yield [
            'a',
            'b',
            -1
        ];

        yield [
            'b',
            'a',
            1
        ];

        yield [
            'aaa',
            'aaa',
            0
        ];

        yield [
            'abcd',
            'abce',
            -1
        ];

        yield [
            'abce',
            'abcd',
            1
        ];
    }
}

 