<?php

class WordWrapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $width
     * @param $expect
     */
    public function test($string, $width, $expect)
    {
        $this->assertSame(wordwrap($string, $width), $expect);
    }

    public function dataProvider()
    {
        $string = 'This is small issue for developer';

        yield [
            $string,
            8,
            "This is\nsmall\nissue\nfor\ndeveloper",
        ];

        yield [
            $string,
            12,
            "This is\nsmall issue\nfor\ndeveloper",
        ];

        yield [
            $string,
            strlen($string),
            'This is small issue for developer',
        ];
    }
}
