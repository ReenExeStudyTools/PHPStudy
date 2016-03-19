<?php

class HTMLEntitiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $expected
     * @param null $quoteStyle
     * @param null $charset
     * @param null $doubleEncode
     */
    public function test($string, $expected, $quoteStyle = null, $charset = null, $doubleEncode = null)
    {
        $this->assertSame($expected, htmlentities($string, $quoteStyle, $charset, $doubleEncode));
    }

    public function dataProvider()
    {
        yield [
            '<b>Title</b>',
            '&lt;b&gt;Title&lt;/b&gt;',
        ];

        yield [
            "<b>Name</b> 'Reen'",
            "&lt;b&gt;Name&lt;/b&gt; 'Reen'",
        ];

        yield [
            "<b>Name</b> 'Reen'",
            "&lt;b&gt;Name&lt;/b&gt; &#039;Reen&#039;",
            ENT_QUOTES
        ];
    }
}
