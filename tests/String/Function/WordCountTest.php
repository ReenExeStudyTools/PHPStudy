<?php

class WordCountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $expected
     */
    public function testDefault($string, $expected)
    {
        $this->assertSame($expected, str_word_count($string));
    }

    public function dataProvider()
    {
        yield [
            '',
            0,
        ];

        yield [
            'This is some simple message',
            5,
        ];

        yield [
            'double with double',
            3,
        ];

        yield [
            'have some, comma',
            3,
        ];

        yield [
            "We're have quote",
            3,
        ];

        yield [
            "Digit between letter one2one",
            5,
        ];
    }
}
