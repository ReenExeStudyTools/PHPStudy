<?php

class SubStrTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider  dataProvider
     * @param $string
     * @param $start
     * @param $length
     * @param $expect
     */
    public function test($string, $start, $length, $expect)
    {
        $this->assertSame(substr($string, $start, ...$length), $expect);
    }

    public function dataProvider()
    {
        yield [
            'word',
            0,
            [],
            'word'
        ];
    }
}
