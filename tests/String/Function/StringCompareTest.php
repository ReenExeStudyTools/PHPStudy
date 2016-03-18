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
    }
}

 