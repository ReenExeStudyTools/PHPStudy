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

    public function testInterval()
    {
        $interval = new \DateInterval('P8Y7M5DT1H9M32S');

        $this->assertSame($interval->y, 8);
        $this->assertSame($interval->m, 7);
        $this->assertSame($interval->d, 5);
        $this->assertSame($interval->h, 1);
        $this->assertSame($interval->i, 9);
        $this->assertSame($interval->s, 32);
    }
}
