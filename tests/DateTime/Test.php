<?php

namespace ReenExe\Study\Test\DateTime;

class Test extends \PHPUnit_Framework_TestCase
{
    public function testCreateFromFormat()
    {
        $string = '2016-12-17 00:00:00';

        $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $string);

        $this->assertEquals($dateTime , new \DateTime($string));
    }
}
