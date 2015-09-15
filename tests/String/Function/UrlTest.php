<?php

class UrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider decodeDataProvider
     * @param $source
     * @param $expected
     */
    public function testDecode($source, $expected)
    {
        $this->assertTrue(urldecode($source) === $expected);
    }

    public function decodeDataProvider()
    {
        yield ['', ''];
    }

    /**
     * @dataProvider encodeDataProvider
     * @param $source
     * @param $expected
     */
    public function testEncode($source, $expected)
    {
        $this->assertTrue(urlencode($source) === $expected);
    }

    public function encodeDataProvider()
    {
        yield ['', ''];
    }

    public function testBuildQuery()
    {
        $this->assertTrue(http_build_query([]) === '');
    }
}