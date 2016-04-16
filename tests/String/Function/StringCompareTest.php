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

    /**
     * @dataProvider limitedDataProvider
     * @param $left
     * @param $right
     * @param $length
     * @param $expected
     */
    public function testFirstLimited($left, $right, $length, $expected)
    {
        $this->assertSame($expected, strncmp($left, $right, $length));
    }

    /**
     * @dataProvider limitedDataProvider
     * @param $left
     * @param $right
     * @param $length
     * @param $expected
     */
    public function testCaseFirstLimited($left, $right, $length, $expected)
    {
        $this->assertSame($expected, strncasecmp($left, $right, $length));
    }

    /**
     * @dataProvider similarTextDefaultDataProvider
     * @param $first
     * @param $second
     * @param $expect
     */
    public function testSimilarTextDefault($first, $second, $expect)
    {
        $this->assertSame($expect, similar_text($first, $second));
    }

    public function similarTextDefaultDataProvider()
    {
        yield [
            'a',
            'a',
            1
        ];

        yield [
            'a',
            'ab',
            1
        ];

        yield [
            'ab',
            'a',
            1
        ];

        yield [
            'yab',
            'xa',
            1
        ];

        yield [
            'abcdef',
            'cde',
            3
        ];

        yield [
            'abcdef',
            'a cde f',
            5
        ];

        yield [
            'abcdef',
            'acdef',
            5
        ];

        yield [
            'abcdef',
            strrev('abcdef'),
            1
        ];

        yield [
            'hello world',
            'world is big',
            5
        ];

        yield [
            'hello world',
            'world hello',
            5
        ];

        yield [
            'hello world',
            'mini world hello',
            6
        ];
    }

    public function limitedDataProvider()
    {
        yield [
            'a',
            'b',
            0,
            0
        ];

        yield [
            'a',
            'b',
            1,
            -1
        ];

        yield [
            'ac',
            'ab',
            1,
            0
        ];

        yield [
            'abc',
            'abd',
            2,
            0
        ];

        yield [
            'abd',
            'abc',
            3,
            1
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
