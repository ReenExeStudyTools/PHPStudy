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

    /**
     * @dataProvider isDataProvider
     * @param callable $callable
     * @param $value
     * @param bool $expect
     */
    public function testIs(callable $callable, $value, bool $expect)
    {
        $this->assertSame($expect, $callable($value));
    }

    public function isDataProvider()
    {
        yield ['is_int', 1, true];
        yield ['is_int', 1.0, false];
        yield ['is_int', true, false];

        yield ['is_float', 1.0, true];
        yield ['is_real', 1.0, true];
        yield ['is_float', 1, false];
        yield ['is_real', 1, false];
        yield ['is_float', 1, false];
        yield ['is_float', '1', false];
        yield ['is_float', '1.0', false];
        yield ['is_real', 1, false];

        yield ['is_numeric', 1, true];
        yield ['is_numeric', 1.0, true];
        yield ['is_numeric', '1', true];


        yield ['is_string', '', true];
        yield ['is_string', 1, false];

        yield ['is_bool', true, true];
        yield ['is_bool', 1, false];

        yield ['is_null', null, true];
        yield ['is_null', false, false];

        yield ['is_array', [], true];
        yield ['is_array', [1], true];
        yield ['is_array', 'some', false];

        $object = new \stdClass();
        yield ['is_object', $object, true];
        yield ['is_object', [], false];

        yield ['is_scalar', 1, true];
        yield ['is_scalar', 1.0, true];
        yield ['is_scalar', true, true];
        yield ['is_scalar', 'text', true];

        yield ['is_scalar', null, false];
        yield ['is_scalar', [], false];
        yield ['is_scalar', $object, false];
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
        yield [' 1 ', 'integer', 1];
        yield ['1', 'int', 1];
        yield [1, 'int', 1];

        yield [1, 'float', 1.0];
        yield [' 1 ', 'float', 1.0];

        yield [1, 'string', '1'];

        yield [1, 'array', [1]];
        yield [1, 'array', [1]];
        yield [[1], 'array', [1]];
        yield [[], 'array', []];

        yield [[], 'null', null];
        yield [1, 'null', null];
        yield ['text', 'null', null];
    }
}