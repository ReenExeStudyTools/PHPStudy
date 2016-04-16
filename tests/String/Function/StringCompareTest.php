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
     * @dataProvider similarTextDataProvider
     * @param $first
     * @param $second
     * @param $expectPercent
     * @param $expect
     */
    public function testSimilarText($first, $second, $expectPercent, $expect)
    {
        $this->assertSame($expect, similar_text($first, $second));
        $this->assertSame($expect, similar_text($first, $second, $percent));
        $this->assertSame($expectPercent, $percent);
    }

    public function similarTextDataProvider()
    {
        yield [
            'a',
            'a',
            100.0,
            1
        ];

        yield [
            'a',
            'ab',
            66.666666666666671,
            1
        ];

        yield [
            'ab',
            'a',
            66.666666666666671,
            1
        ];

        yield [
            'yab',
            'xa',
            40.0,
            1
        ];

        yield [
            'abcdef',
            'cde',
            66.666666666666671,
            3
        ];

        yield [
            'abcdef',
            'a cde f',
            76.92307692307692,
            5
        ];

        yield [
            'abcdef',
            'acdef',
            90.909090909090907,
            5
        ];

        yield [
            'abcdef',
            strrev('abcdef'),
            16.666666666666668,
            1
        ];

        yield [
            'hello world',
            'world is big',
            43.478260869565219,
            5
        ];

        yield [
            'hello world',
            'world hello',
            45.454545454545453,
            5
        ];

        yield [
            'hello world',
            'mini world hello',
            44.444444444444443,
            6
        ];

        yield [
            'hello world',
            'hello mini world',
            81.481481481481481,
            11
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
