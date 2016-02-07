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

        yield [
            10,
            2.3025850929940459
        ];
    }

    /**
     * @dataProvider logBaseDataProvider
     * @param $arg
     * @param $base
     * @param $expect
     */
    public function testLogBase($arg, $base, $expect)
    {
        $this->assertSame(log($arg, $base), $expect);
    }

    public function logBaseDataProvider()
    {
        yield [
            1,
            10,
            0.0
        ];

        yield [
            1,
            2,
            0.0
        ];

        yield [
            9,
            3,
            2.0
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
