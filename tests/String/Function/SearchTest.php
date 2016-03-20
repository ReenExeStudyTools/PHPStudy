<?php

class SearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider stringPositionProvider
     */
    public function testStringPosition($haystack, $needle, $offset, $expected)
    {
        $this->assertSame(strpos($haystack, $needle, $offset), $expected);
    }

    public function stringPositionProvider()
    {
        return [
            ['California', 'for', null, 4],
            ['California', 'Calif', null, 0],
            ['California', 'calif', null, false],
            ['California', 'while', null, false],
            ['California', 'for', 5, false],
        ];
    }

    /**
     * @dataProvider stringReversePositionProvider
     */
    public function testStringReversePosition($haystack, $needle, $offset, $expected)
    {
        $this->assertSame(strrpos($haystack, $needle, $offset), $expected);
    }

    public function stringReversePositionProvider()
    {
        yield from $this->stringPositionProvider();

        yield [
            'for to for',
            'for',
            null,
            7
        ];

        yield [
            'for to for',
            'for',
            5,
            7
        ];

        yield [
            'for to for',
            'for',
            7,
            7
        ];

        yield [
            'for to for',
            'for',
            8,
            false
        ];
    }

    /**
     * @dataProvider stringInsensitivePositionProvider
     * @param $haystack
     * @param $needle
     * @param $offset
     * @param $expected
     */
    public function testStringInsensitivePosition($haystack, $needle, $offset, $expected)
    {
        $this->assertSame(stripos($haystack, $needle, $offset), $expected);
    }

    public function stringInsensitivePositionProvider()
    {
        yield [
            'a',
            'a',
            0,
            0
        ];

        yield [
            'a',
            'A',
            0,
            0
        ];

        yield [
            'B',
            'A',
            0,
            false
        ];

        yield [
            'ABC',
            'c',
            0,
            2
        ];

        yield [
            'ABC',
            'c',
            1,
            2
        ];
    }

    /**
     * @dataProvider strtrDataProvider
     * @param $str
     * @param $from
     * @param $to
     * @param $expect
     */
    public function testStrtr($str, $from, $to, $expect)
    {
        $this->assertSame(strtr($str, $from, $to), $expect);
    }

    public function strtrDataProvider()
    {
        yield [
            'a a',
            'a',
            'c',
            'c c'
        ];

        yield [
            'abc',
            'abcd',
            'abcde',
            'abc'
        ];
    }

    /**
     * @dataProvider strtrPairsDataProvider
     * @param $str
     * @param array $pairs
     * @param $expect
     */
    public function testStrtrPairs($str, array $pairs, $expect)
    {
        $this->assertSame(strtr($str, $pairs), $expect);
    }

    public function strtrPairsDataProvider()
    {
        yield [
            'a a',
            [
                'a' => 'b'
            ],
            'b b'
        ];

        yield [
            'a b',
            [
                'a' => 'b',
                'b' => 'c',
            ],
            'b c'
        ];

        yield [
            'abc',
            [
                'ab' => 'bc',
                'bc' => 'cd',
            ],
            'bcc'
        ];
    }

    /**
     * @dataProvider strStrDataDefaultProvider
     * @param $haystack
     * @param $needle
     * @param $expect
     */
    public function testStrStrDefault($haystack, $needle, $expect)
    {
        $this->assertSame(strstr($haystack, $needle), $expect);
    }

    public function strStrDataDefaultProvider()
    {
        yield [
            'this is some find me',
            'f',
            'find me'
        ];

        yield [
            'this is some find me',
            'find',
            'find me'
        ];

        yield [
            'this is some find me',
            'F',
            false
        ];
    }

    /**
     * @dataProvider strStrDataInsensitiveProvider
     * @param $haystack
     * @param $needle
     * @param $expect
     */
    public function testStrInsensitiveStr($haystack, $needle, $expect)
    {
        $this->assertSame(stristr($haystack, $needle), $expect);
    }

    public function strStrDataInsensitiveProvider()
    {
        yield [
            'this is some find me',
            'f',
            'find me'
        ];

        yield [
            'this is some find me',
            'find',
            'find me'
        ];

        yield [
            'this is some find me',
            'F',
            'find me'
        ];
    }
}