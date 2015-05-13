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

    public function testSetType()
    {
        $value = '1';
        settype($value, 'integer');
        $this->assertTrue($value === 1);
    }

    public function testIs()
    {
        $this->assertTrue(is_int(1));
        $this->assertFalse(is_int(1.0));
        $this->assertFalse(is_int('1'));
        $this->assertFalse(is_int(true));

        $this->assertTrue(is_float(1.0));
        $this->assertFalse(is_float(1));

        $this->assertTrue(is_string(''));
        $this->assertFalse(is_string(1));

        $this->assertTrue(is_bool(true));
        $this->assertFalse(is_bool(1));

        $this->assertTrue(is_null(null));
        $this->assertFalse(is_null(false));

        $this->assertTrue(is_array([]));

        $object = new \stdClass();
        $this->assertTrue(is_object($object));
        $this->assertFalse(is_object([]));
    }
}