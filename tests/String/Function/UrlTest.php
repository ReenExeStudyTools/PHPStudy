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

    /**
     * @dataProvider parseUrlDataProvider
     * @param $url
     * @param array $expected
     */
    public function testParseUrl($url, array $expected)
    {
        $this->assertSame($expected, parse_url($url));
    }

    public function parseUrlDataProvider()
    {
        yield [
            '',
            [
                'path' => ''
            ]
        ];

        yield [
            '/',
            [
                'path' => '/'
            ]
        ];


        yield [
            '/catalog',
            [
                'path' => '/catalog'
            ]
        ];

        yield [
            '/catalog?key=value',
            [
                'path' => '/catalog',
                'query' => 'key=value',
            ]
        ];

        yield [
            '/catalog?key=value&other=same',
            [
                'path' => '/catalog',
                'query' => 'key=value&other=same',
            ]
        ];

        yield [
            '/catalog?key=value&other=same#container',
            [
                'path' => '/catalog',
                'query' => 'key=value&other=same',
                'fragment' => 'container'
            ]
        ];

        yield [
            'example.com/catalog?key=value&other=same#container',
            [
                'path' => 'example.com/catalog',
                'query' => 'key=value&other=same',
                'fragment' => 'container'
            ]
        ];

        yield [
            'http://example.com/catalog?key=value&other=same#container',
            [
                'scheme' => 'http',
                'host' => 'example.com',
                'path' => '/catalog',
                'query' => 'key=value&other=same',
                'fragment' => 'container'
            ]
        ];

        yield [
            'https://example.com/catalog?key=value&other=same#container',
            [
                'scheme' => 'https',
                'host' => 'example.com',
                'path' => '/catalog',
                'query' => 'key=value&other=same',
                'fragment' => 'container'
            ]
        ];

        /**
         * broken url - but got result
         */
        yield [
            'https://catalog?key=value&other=same#container',
            [
                'scheme' => 'https',
                'host' => 'catalog',
                'query' => 'key=value&other=same',
                'fragment' => 'container'
            ]
        ];
    }
}