<?php

class SlashesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider splashesDataProvider
     * @param $string
     * @param $expect
     */
    public function testAddSplashes($string, $expect)
    {
        $this->assertSame(addslashes($string), $expect);
    }

    /**
     * @dataProvider splashesDataProvider
     * @param $expect
     * @param $string
     */
    public function testStripSlashes($expect, $string)
    {
        $this->assertSame(stripslashes($string), $expect);
    }

    public function splashesDataProvider()
    {
        yield [
            '',
            ''
        ];

        yield [
            '\\',
            '\\\\'
        ];

        yield [
            "We're",
            "We\'re"
        ];

        yield [
            "We\'re",
            "We\\\\\\'re"
        ];

        yield [
            '"',
            '\"'
        ];
    }

    /**
     * @dataProvider cSplashesDataProvider
     * @param $string
     * @param $charList
     * @param $expect
     */
    public function testAddCSlashes($string, $charList, $expect)
    {
        $this->assertSame($expect, addcslashes($string, $charList));
    }

    public function cSplashesDataProvider()
    {
        yield [
            '',
            '',
            ''
        ];

        yield [
            '\\',
            '',
            '\\'
        ];

        yield [
            'a',
            'a',
            '\a'
        ];

        yield [
            'abc',
            'abc',
            '\a\b\c'
        ];

        yield [
            'abc',
            'ac',
            '\ab\c'
        ];
    }
}
