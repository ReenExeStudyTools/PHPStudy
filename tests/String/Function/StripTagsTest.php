<?php

class StripTagsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider defaultDataProvider
     * @param $string
     * @param $expected
     */
    public function testDefault($string, $expected)
    {
        $this->assertSame($expected, strip_tags($string));
    }

    public function defaultDataProvider()
    {
        yield [
            '',
            ''
        ];

        yield [
            '<b>value</b>',
            'value'
        ];

        yield [
            ' <span>value</span> ',
            ' value '
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $expected
     * @param $allowableTags
     */
    public function test($string, $expected, $allowableTags)
    {
        $this->assertSame($expected, strip_tags($string, $allowableTags));
    }

    public function dataProvider()
    {
        yield [
            'text',
            'text',
            null,
        ];

        yield [
            '<b>text</b>',
            'text',
            null,
        ];

        yield [
            '<b>text</b>',
            'text',
            '<span></span>',
        ];

        yield [
            '<b>text</b>',
            '<b>text</b>',
            '<b></b>',
        ];

        // only start tag - but stay closed too
        yield [
            '<b>text</b>',
            '<b>text</b>',
            '<b>',
        ];

        yield [
            '<span><b>text</b></span>',
            '<b>text</b>',
            '<b></b>',
        ];

        // broken
        yield [
            '<b>text<b>',
            '<b>text<b>',
            '<b></b>',
        ];

        // broken
        yield [
            '<b>text',
            '<b>text',
            '<b></b>',
        ];
    }
}
