<?php

class BasicTest extends \PHPUnit_Framework_TestCase
{
    public function testPush()
    {
        $array = [];

        $array[] = 'value';

        $this->assertSame($array[0], 'value');

        $array[7] = 'prev';
        $array[] = 'next';

        $this->assertSame($array[8], 'next');
    }

    public function testStack()
    {
        $array = [];

        array_push($array, 1, 2, 3);

        $this->assertTrue($array === [1, 2, 3]);

        $this->assertTrue(array_pop($array) === 3);
        $this->assertTrue($array === [1, 2]);

        array_unshift($array, 7, 8, 9);
        $this->assertTrue($array === [7, 8, 9, 1, 2]);

        $this->assertTrue(array_shift($array) === 7);
        $this->assertTrue($array === [8, 9, 1, 2]);
    }

    public function testNumeration()
    {
        $array = [
            '1' => 'One', 1 => 'Two', 'Three', 2 => 'Four'
        ];

        $this->assertTrue($array === [1 => 'Two', 2 => 'Four']);
    }

    public function testAdd()
    {
        // full
        $this->assertTrue([1 => 1] + [2 => 2] === [1 => 1, 2 => 2]);

        // priority
        $this->assertTrue([1 => 1] + [1 => 2] === [1 => 1]);

        $this->assertTrue([1 => 2] + [1 => 3] + [1 => 1] === [1 => 2]);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Illegal offset type
     */
    public function testKeyScalarObject()
    {
        $object = (object) 'value';

        $this->assertTrue($object->scalar === 'value');

        [$object => 1];
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Illegal offset type
     */
    public function testKeyStringObject()
    {
        $stringObject = new \ReenExe\Study\StringClass('value');

        $this->assertFalse($stringObject === 'value');
        $this->assertTrue((string) $stringObject === 'value');
        $this->assertTrue($stringObject == 'value');

        // exception
        [$stringObject => 1];
    }
}