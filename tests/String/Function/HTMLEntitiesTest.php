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

    /**
     * @dataProvider revertDataProvider
     * @param $string
     * @param $expected
     * @param null $quoteStyle
     * @param null $charset
     * @param null $doubleEncode
     */
    public function testSpecialChars($string, $expected, $quoteStyle = null, $charset = null, $doubleEncode = null)
    {
        $this->assertSame($expected, htmlspecialchars($string, $quoteStyle, $charset, $doubleEncode));
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
            "&lt;b&gt;Name&lt;/b&gt; 'Reen'",
            ENT_COMPAT
        ];

        yield [
            '<b>Name</b> "Reen"',
            '&lt;b&gt;Name&lt;/b&gt; "Reen"',
        ];

        yield [
            '<b>Name</b> "Reen"',
            '&lt;b&gt;Name&lt;/b&gt; &quot;Reen&quot;',
            ENT_COMPAT
        ];

        yield [
            '<b>Name</b> "Reen"' . "'Exe'",
            '&lt;b&gt;Name&lt;/b&gt; &quot;Reen&quot;'. "'Exe'",
            ENT_COMPAT
        ];

        yield [
            "<b>Name</b> 'Reen'",
            "&lt;b&gt;Name&lt;/b&gt; &#039;Reen&#039;",
            ENT_QUOTES
        ];
    }

    public function revertDataProvider()
    {
        yield [
            '<b>Title</b>',
            '&lt;b&gt;Title&lt;/b&gt;',
        ];
    }
}
