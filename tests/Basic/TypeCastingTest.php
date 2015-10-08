<?php

class TypeCastingTest extends \PHPUnit_Framework_TestCase
{
    public function testOperator()
    {
        $this->assertTrue((int) '1' === 1);
        $this->assertTrue((int) ' 1 ' === 1);
        $this->assertTrue((int) true === 1);
        $this->assertTrue((int) [] === 0);
        $this->assertTrue((int) [1] === 1);
        $this->assertTrue((int) [2] === 1);
        $this->assertTrue((int) [1, 2] === 1);

        $this->assertTrue((string) 1 === '1');
        $this->assertTrue((string) true === '1');
        $this->assertTrue((string) false === '');

        $this->assertTrue((bool) 'OK' === true);

        $this->assertTrue((float) '1' === 1.0);
        $this->assertTrue((float) '1' === 1.0);
        $this->assertTrue((float) [] === 0.0);
        $this->assertTrue((float) [1] === 1.0);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error
     * @expectedExceptionMessage Object of class stdClass could not be converted to string
     */
    public function testObjectToStringConvert()
    {
        $object = (object) 'value';

        $this->assertTrue($object->scalar === 'value');

        (string) $object;
    }

    /**
     * @expectedException \PHPUnit_Framework_Error
     * @expectedExceptionMessage Array to string conversion
     */
    public function testArrayToStringConvert()
    {
        $array = ['value'];

        (string) $array;
    }

    public function testFunction()
    {
        $this->assertTrue(intval('1') === 1);
        $this->assertTrue(intval(true) === 1);
        $this->assertTrue(strval(1) === '1');
        $this->assertTrue(boolval('OK') === true);
        $this->assertTrue(floatval('1') === 1.0);
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

    /**
     * @dataProvider setTypeProvider
     */
    public function testSetType($value, $type, $expect)
    {
        settype($value, $type);
        $this->assertTrue($value === $expect);
    }

    public function setTypeProvider()
    {
        yield ['1', 'integer', 1];
    }
}