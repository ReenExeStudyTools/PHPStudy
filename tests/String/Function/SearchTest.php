<?php

class SearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider strposProvider
     */
    public function testStrpos($haystack, $needle, $offset, $pos)
    {
        $this->assertSame(strpos($haystack, $needle, $offset), $pos);
    }

    public function strposProvider()
    {
        return [
            ['California', 'for', null, 4],
            ['California', 'while', null, false],
            ['California', 'for', 5, false],
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
}