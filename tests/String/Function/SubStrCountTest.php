<?php

class SubStrCountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $replacement
     * @param $start
     * @param $length
     * @param $expect
     */
    public function test($string, $replacement, $start, $length, $expect)
    {
        $this->assertSame(
            substr_count($string, $replacement, ...$start, ...$length),
            $expect
        );
    }

    public function dataProvider()
    {
        yield [
            'good morning and good evening',
            'good',
            [],
            [],
            2
        ];

        yield [
            'good morning and good evening',
            'good',
            [1],
            [],
            1
        ];

        yield [
            'good morning and good evening',
            'good',
            [1],
            [1],
            0
        ];
    }
}
