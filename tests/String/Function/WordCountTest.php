<?php

class WordCountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $expected
     * @param $string
     */
    public function testDefault($expected, $string)
    {
        $this->assertSame($expected, str_word_count($string));
    }

    public function dataProvider()
    {
        yield [
            0,
            ''
        ];
    }
}
