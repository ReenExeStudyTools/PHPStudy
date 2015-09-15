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
        $this->assertSame(urldecode($source), $expected);
    }

    public function decodeDataProvider()
    {
        yield ['', ''];
        yield ['&', '&'];
        yield ['%26', '&'];
        yield ['key=1,2', 'key=1,2'];
        yield ['key%3D1%2C2', 'key=1,2'];
    }

    /**
     * @dataProvider encodeDataProvider
     * @param $source
     * @param $expected
     */
    public function testEncode($source, $expected)
    {
        $this->assertSame(urlencode($source), $expected);
    }

    public function encodeDataProvider()
    {
        yield ['', ''];
        yield ['&', '%26'];
        yield ['key=1,2', 'key%3D1%2C2'];
    }

    /**
     * @dataProvider buildQueryDataProvider
     * @param array $source
     * @param $expected
     */
    public function testBuildQuery(array $source, $expected)
    {
        $this->assertSame(http_build_query($source), $expected);
    }

    public function buildQueryDataProvider()
    {
        yield [
            [],
            ''
        ];

        yield [
            [
                'a' => 1,
                'c' => 3,
                'b' => 2
            ],
            'a=1&c=3&b=2'
        ];

        yield [
            [
                'a' => '1,7'
            ],
            'a=1%2C7'
        ];

        yield [
            [
                'a' => '1 7'
            ],
            'a=1+7'
        ];
    }
}