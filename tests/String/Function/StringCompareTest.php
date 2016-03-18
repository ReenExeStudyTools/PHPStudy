<?php

class StringCompareTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider caseDataProvider
     * @param $left
     * @param $right
     * @param $expected
     */
    public function testCase($left, $right, $expected)
    {
        $this->assertSame($expected, strcasecmp($left, $right));
    }

    public function caseDataProvider()
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

 