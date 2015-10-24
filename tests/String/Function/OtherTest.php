<?php

class OtherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider levenshteinDataProvider
     * @param $str1
     * @param $str2
     * @param $distance
     */
    public function testLevenshtein($str1, $str2, $distance)
    {
        $this->assertTrue(levenshtein($str1, $str2) === $distance);
    }

    public function levenshteinDataProvider()
    {
        yield [
            'abc',
            'abc',
            0,
        ];

        yield [
            'abc',
            'abd',
            1,
        ];

        yield [
            'aaa',
            'AAA',
            3,
        ];

        yield [
            'AAA',
            'aaa',
            3,
        ];

        yield [
            'xy',
            'y',
            1,
        ];
    }
}
