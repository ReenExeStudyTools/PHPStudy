<?php

class TypeCastingTest extends \PHPUnit_Framework_TestCase
{
    public function testOperator()
    {
        $this->assertTrue((int) '1' === 1);
        $this->assertTrue((int) true === 1);
        $this->assertTrue((string) 1 === '1');
        $this->assertTrue((bool) 'OK' === true);
        $this->assertTrue((float) '1' === 1.0);
    }

    public function testFunction()
    {
        $this->assertTrue(intval('1') === 1);
        $this->assertTrue(intval(true) === 1);
        $this->assertTrue(strval(1) === '1');
        $this->assertTrue(boolval('OK') === true);
        $this->assertTrue(floatval('1') === 1.0);
    }
}