<?php

class FunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testValues()
    {
        $this->assertTrue(array_values([]) === []);
        $this->assertTrue(array_values(['key' => 'value']) === ['value']);
    }

    public function testKeys()
    {
        $this->assertTrue(array_keys([]) === []);
        $this->assertTrue(array_keys(['a' => 1, 'b' => 2]) === ['a', 'b']);
    }

    public function testArrayKeyExist()
    {
        $array = ['key' => null];
        $this->assertTrue(array_key_exists('key', $array));
        $this->assertFalse(isset($array['key']));
    }

    public function testMerge()
    {
        // can merge one params
        $this->assertTrue(array_merge([1]) === [1]);
        // flush numeric keys
        $this->assertTrue(array_merge([1 => 1]) === [1]);
        // stay assoc keys
        $this->assertTrue(array_merge(['k' => 'v']) === ['k' => 'v']);
        $this->assertTrue(array_merge([1], [2]) === [1, 2]);
        $this->assertTrue(array_merge(['x'], ['y'], ['z']) === ['x', 'y', 'z']);
        // flush numeric keys
        $this->assertTrue(
            array_merge([1 => 'a'], [2 => 'b'], [3 => 'c']) === ['a', 'b', 'c']
        );

        // on double key - use last pair key-value
        $this->assertTrue(
            array_merge(['a' => 1], ['a' => 3], ['a' => 2]) === ['a' => 2]
        );

        // stay first key sequence
        $this->assertTrue(
            array_merge([1, 2, 3, 'a' => 4], [5, 6, 7, 'b' => 8], ['a' => 'x', 'b' => 'y']) === [1, 2, 3, 'a' => 'x', 5, 6, 7, 'b' => 'y']
        );
    }

    public function testFlip()
    {
        $this->assertTrue(array_flip([1]) === [1 => 0]);
        $this->assertTrue(array_flip([1 => 'a']) === ['a' => 1]);

        // use last key
        $this->assertTrue(array_flip([1, 1]) === [1 => 1]);
        $this->assertTrue(array_flip(['a' => 1, 'b' => 1]) === [1 => 'b']);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage array_flip(): Can only flip STRING and INTEGER values!
     */
    public function testFlipIncorrectValueArrayAsKey()
    {
        array_flip(['a' => array()]);
    }

    public function testCombine()
    {
        // simple
        $this->assertTrue(array_combine([1, 2, 3], ['a', 'b', 'c']) === [1 => 'a', 2 => 'b', 3 => 'c']);

        // on key double use last value
        $this->assertTrue(array_combine([1, 1, 1], ['a', 'b', 'c']) === [1 => 'c']);

        // for fun
        $this->assertTrue(array_combine([], []) === []);

        $array = [
            'a' => 1,
            'b' => 8,
            'c' => 27,
        ];

        $this->assertTrue(
            array_combine(array_keys($array), array_values($array)) === $array
        );

        $this->assertTrue(
            array_combine(array_keys($array), $array) === $array
        );

        $this->assertTrue(
            array_combine(array_values($array), array_keys($array)) === array_flip($array)
        );

        $this->assertTrue(
            array_combine($array, array_keys($array)) === array_flip($array)
        );
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Both parameters should have an equal number of elements
     */
    public function testCombineWithDifferentLength()
    {
        array_combine([1, 2], [3]);
    }

    public function testCombineWithDifferentLengthResult()
    {
        // for fun
        $this->assertTrue(@array_combine([1, 2], [3]) === false);

        $this->assertTrue(@array_combine([1, 1], [3]) === false);
    }

    public function testArrayCountValues()
    {
        $this->assertTrue(
            array_count_values([]) === []
        );

        $this->assertTrue(
            array_count_values(['a', 'b']) === ['a' => 1, 'b' => 1]
        );

        $this->assertTrue(
            array_count_values(['a', 'b', 'a', 'c']) === ['a' => 2, 'b' => 1, 'c' => 1]
        );
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage array_count_values(): Can only count STRING and INTEGER values!
     */
    public function testArrayCountValuesIncorrect()
    {
        array_count_values([ 'key' => [] ]);
    }

    public function testArrayCountValuesIncorrectResult()
    {
        $this->assertTrue(
            @array_count_values([['this is array'], 'b', 'a']) === ['b' => 1, 'a' => 1]
        );
    }
}