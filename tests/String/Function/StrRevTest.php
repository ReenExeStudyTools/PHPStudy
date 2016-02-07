<?php

class StrRevTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $source
     * @param $reverse
     */
    public function test($source, $reverse)
    {
        $this->assertSame(strrev($source), $reverse);
    }

    public function dataProvider()
    {
        yield [
            'abc',
            'cba'
        ];

        yield [
            123,
            '321'
        ];
    }
}
