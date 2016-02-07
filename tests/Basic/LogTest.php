<?php

class LogTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider logDataProvider
     * @param $arg
     * @param $expect
     */
    public function testLog($arg, $expect)
    {
        $this->assertSame(log($arg), $expect);
    }

    public function logDataProvider()
    {
        yield [
            1,
            0.0
        ];
    }

    /**
     * @dataProvider log10DataProvider
     * @param $arg
     * @param $expect
     */
    public function testLog10($arg, $expect)
    {
        $this->assertSame(log10($arg), $expect);
    }

    public function log10DataProvider()
    {
        yield [
            1,
            0.0
        ];

        yield [
            10,
            1.0
        ];

        yield [
            100,
            2.0
        ];
    }
}
