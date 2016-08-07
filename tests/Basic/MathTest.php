<?php

class MathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider minDataProvider
     * @param $expect
     * @param array $values
     */
    public function testMinArray($expect, array $values)
    {
        $this->assertSame($expect, min($values));
    }

    public function testMin()
    {
        $this->assertSame(7, min(11, 15, 7, 9, 21));
    }

    public function minDataProvider()
    {
        yield [
            1,
            [1, 2, 3]
        ];

        yield [
            '1',
            ['1', 2, 3]
        ];
    }

    /**
     * @dataProvider maxDataProvider
     * @param $expect
     * @param array $values
     */
    public function testMaxArray($expect, array $values)
    {
        $this->assertSame($expect, max($values));
    }

    public function testMax()
    {
        $this->assertSame(87, max(11, 15, 87, 9, 21));
    }

    public function maxDataProvider()
    {
        yield [
            3,
            [1, 2, 3]
        ];

        yield [
            '3',
            [1, 2, '3']
        ];
    }

    /**
     * @dataProvider absDataProvider
     * @param $number
     * @param $expected
     */
    public function testAbs($number, $expected)
    {
        $this->assertSame($expected, abs($number));
    }

    public function absDataProvider()
    {
        yield [1, 1];
        yield [1.0, 1.0];
        yield [-1.0, 1.0];
        yield ['1', 1];
        yield ['-1', 1];
        yield ['-1.0', 1.0];
    }

    /**
     * @dataProvider baseConvertDataProvider
     * @param $number
     * @param $from
     * @param $to
     * @param $expect
     */
    public function testBaseConvert($number, $from, $to, $expect)
    {
        $this->assertSame($expect, base_convert($number, $from, $to));
    }

    public function baseConvertDataProvider()
    {
        return [
            [1, 2, 2, '1'],
            ['1', 3, 3, '1'],
            ['2', 3, 2, '10'],
        ];
    }
}
