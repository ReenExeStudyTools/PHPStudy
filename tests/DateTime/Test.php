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
}
