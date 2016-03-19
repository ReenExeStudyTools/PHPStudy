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
    }
}
