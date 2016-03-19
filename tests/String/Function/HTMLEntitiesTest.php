<?php

class HTMLEntitiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $expected
     * @param $string
     * @param null $quoteStyle
     * @param null $charset
     * @param null $doubleEncode
     */
    public function test($expected, $string, $quoteStyle = null, $charset = null, $doubleEncode = null)
    {
        $this->assertSame($expected, htmlentities($string, $quoteStyle, $charset, $doubleEncode));
    }

    public function dataProvider()
    {
        yield [
            '&lt;b&gt;Title&lt;/b&gt;',
            '<b>Title</b>',
        ];
    }
}
