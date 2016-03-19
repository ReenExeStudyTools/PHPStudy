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
     * @param $expect
     * @param $string
     * @param $charList
     */
    public function testAddCSlashes($expect, $string, $charList)
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
    }
}
