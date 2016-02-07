<?php

class TrimTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $expect
     */
    public function test($string, $expect)
    {
        $this->assertSame(trim($string), $expect);
    }

    public function dataProvider()
    {
        yield [
            '',
            ''
        ];

        yield [
            'a',
            'a'
        ];

        yield [
            ' a',
            'a'
        ];

        yield [
            'a ',
            'a'
        ];

        yield [
            ' a ',
            'a'
        ];

        yield [
            ' abc ',
            'abc'
        ];

        yield [
            " \n abc \n ",
            'abc'
        ];
    }
}
