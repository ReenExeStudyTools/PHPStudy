<?php

class ChangeCaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider ucfirstDataProvider
     * @param $string
     * @param $expect
     */
    public function testUcfirst($string, $expect)
    {
        $this->assertSame(ucfirst($string), $expect);
    }

    public function ucfirstDataProvider()
    {
        yield [
            'this',
            'This'
        ];

        yield [
            'This',
            'This'
        ];

        yield [
            'this is that',
            'This is that'
        ];

        yield [
            123,
            '123'
        ];
    }

    /**
     * @dataProvider ucwordsDataProvider
     * @param $string
     * @param $expect
     */
    public function testUcwords($string, $expect)
    {
        $this->assertSame(ucwords($string), $expect);
    }

    public function ucwordsDataProvider()
    {
        yield [
            'this',
            'This'
        ];

        yield [
            'This',
            'This'
        ];

        yield [
            'this is that',
            'This Is That'
        ];
    }

    /**
     * @dataProvider strToCaseDataProvider
     * @param $string
     * @param $lower
     * @param $upper
     */
    public function testStrToCase($string, $lower, $upper)
    {
        $this->assertSame(strtolower($string), $lower);
        $this->assertSame(strtoupper($string), $upper);
    }

    public function strToCaseDataProvider()
    {
        yield [
            'abc',
            'abc',
            'ABC'
        ];

        yield [
            'ABC',
            'abc',
            'ABC'
        ];

        yield [
            'aBc',
            'abc',
            'ABC'
        ];

        yield [
            '1A',
            '1a',
            '1A'
        ];

        yield [
            123,
            '123',
            '123'
        ];
    }
}
