<?php

class TrimTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $expect
     * @param $right
     * @param $left
     */
    public function test($string, $expect, $right, $left)
    {
        $this->assertSame(trim($string), $expect);
        $this->assertSame(rtrim($string), $right);
        $this->assertSame(ltrim($string), $left);
    }

    public function dataProvider()
    {
        yield [
            '',
            '',
            '',
            '',
        ];

        yield [
            'a',
            'a',
            'a',
            'a',
        ];

        yield [
            ' a',
            'a',
            ' a',
            'a',
        ];

        yield [
            'a ',
            'a',
            'a',
            'a ',
        ];

        yield [
            ' a ',
            'a',
            ' a',
            'a ',
        ];

        yield [
            ' abc ',
            'abc',
            ' abc',
            'abc ',
        ];

        yield [
            " \n abc \n ",
            'abc',
            " \n abc",
            "abc \n ",
        ];
    }
}
