<?php

namespace ReenExe\Study\Test\DateTime;

class Test extends \PHPUnit_Framework_TestCase
{
    public function testCreateFromFormat()
    {
        $string = '2016-12-17 00:00:00';

        $format = 'Y-m-d H:i:s';

        $dateTime = new \DateTime($string);

        $this->assertEquals(
            $dateTime,
            \DateTime::createFromFormat($format, $string)
        );

        $this->assertEquals(
            $dateTime,
            date_create_from_format($format, $string)
        );
    }

    /**
     * @dataProvider intervalDataProvider
     * @param $string
     * @param $y
     * @param $m
     * @param $d
     * @param $h
     * @param $i
     * @param $s
     */
    public function testInterval($string, $y, $m, $d, $h, $i, $s)
    {
        $interval = new \DateInterval($string);

        $this->assertSame($interval->y, $y);
        $this->assertSame($interval->m, $m);
        $this->assertSame($interval->d, $d);
        $this->assertSame($interval->h, $h);
        $this->assertSame($interval->i, $i);
        $this->assertSame($interval->s, $s);
    }

    public function intervalDataProvider()
    {
        yield [
            'P8Y7M5DT1H9M32S',
            $y = 8,
            $m = 7,
            $d = 5,
            $h = 1,
            $i = 9,
            $s = 32,
        ];
    }
}
