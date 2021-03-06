<?php

class BasicTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * @expectedException \PHPUnit_Framework_Error_Notice
     * @expectedExceptionMessage Undefined index: description
     */
    public function testUndefinedKey()
    {
        $array = [];
        $value = $array['description'];
    }

    public function testExpression()
    {
        $this->assertSame([1 + 2 => 8], [3 => 8]);
        $this->assertSame([1 * 2 => 3], [2 => 3]);
        $this->assertSame([1 . 5 => 3], ['15' => 3]);
    }

    public function testSetNested()
    {
        $array = [];
        $this->assertTrue(empty($array['a']['b']['c']));
        $this->assertTrue(empty($array['a']['b']));
        $this->assertTrue(empty($array['a']));

        $array['a']['b']['c'] = true;
        $this->assertTrue($array === [
            'a' => [
                'b' => [
                    'c' => true
                ]
            ]    
        ]);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Cannot use a scalar value as an array
     */
    public function testNumberSet()
    {
        $array = 1;
        $array['key'] = 'value';
    }

    public function testNullSet()
    {
        $array = null;
        $array['key'] = 'value';
        $this->assertSame($array, ['key' => 'value']);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Notice
     * @expectedExceptionMessage Undefined variable: array
     */
    public function testSetUndefinedOffset()
    {
        $array['key'] = $array['key'];
    }

    public function testNullSetUndefinedOffsetSameOffset()
    {
        $array = null;
        $array['key'] = $array['key'];
        $this->assertSame($array, ['key' => null]);
    }

    public function testNullSetUndefinedOffset()
    {
        $array = null;
        $array['key'] = $array['value'];
        $this->assertSame($array, ['key' => null]);
    }

    public function testNextKey()
    {
        $array = [];

        $array[] = 'value';

        $this->assertSame($array[0], 'value');

        $array[7] = 'prev';
        $array[] = 'next';

        $this->assertSame($array[8], 'next');

        unset($array[0], $array[7], $array[8]);

        $this->assertEmpty($array);

        $array[] = 'one';
        $this->assertSame($array[9], 'one');
    }

    public function testNextKeyAfterMinus()
    {
        $array = [
            -5 => 'first'
        ];

        $array[] = 'value';

        $this->assertSame($array[0], 'value');
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

    public function testAssocStack()
    {
        $assoc = ['a' => 1, 'b' => 2, 'c' => 3];

        $this->assertTrue(array_push($assoc, 'x', 'y', 'z') === count($assoc));

        $this->assertTrue($assoc === ['a' => 1, 'b' => 2, 'c' => 3, 'x', 'y','z']);

        $assoc = ['a' => 1, 'b' => 2, 'c' => 3];

        $this->assertTrue(array_pop($assoc) === 3);
        $this->assertTrue($assoc === ['a' => 1, 'b' => 2]);

        array_unshift($assoc, 'x', 'y', 'z');
        $this->assertTrue($assoc === ['x', 'y', 'z', 'a' => 1, 'b' => 2]);

        $hybrid = ['start' => 'begin', 1 => 'a', 2 => 'b', 3 => 'c', 'finish' => 'end'];
        $this->assertTrue(array_shift($hybrid) === 'begin');

        // reset number keys
        $this->assertTrue($hybrid === ['a', 'b', 'c', 'finish' => 'end']);
    }

    public function testNumeration()
    {
        $array = [
            '1' => 'One', 1 => 'Two', 'Three', 2 => 'Four'
        ];

        $this->assertTrue($array === [1 => 'Two', 2 => 'Four']);
    }

    public function testFloat()
    {
        $this->assertSame((string) 12.5, '12.5');
        $this->assertSame([12.05 => 'value'], [12 => 'value']);
        $this->assertSame([12.5 => 'value'], [12 => 'value']);
        $this->assertSame([12.50 => 'value'], [12 => 'value']);
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

    public function testUnsetNested()
    {
        $array = ['key' => 'value'];

        unset($array['a']['b']['c']);

        $this->assertSame(['key' => 'value'], $array);
    }

    public function testUnsetMulti()
    {
        $array = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
            'd' => 4,
            'e' => 5,
        ];

        unset($array['b'], $array['d']);

        $this->assertSame(
            [
                'a' => 1,

                'c' => 3,

                'e' => 5,
            ],
            $array
        );
    }
}
