<?php

use ReenExe\Study\EntityClass;

class VariadicTest extends \PHPUnit_Framework_TestCase
{
    public function testPush()
    {
        $array = ['a'];
        $push = ['b', 'c'];
        array_push($array, ... $push);
        $this->assertSame($array, ['a', 'b', 'c']);
    }

    public function testShufflePush()
    {
        /**
         * Fatal error: Cannot use positional argument after argument unpacking

            $array = ['a'];
            array_push($array, ... ['b', 'c'], 'd', 'e', ... ['f', 'g']);
            $this->assertSame($array, ['a', 'b', 'c', 'd', 'e', 'f', 'g']);

         */
    }

    public function testPushDouble()
    {
        /**
         * just for fun
         */
        $array = [
            [],
            'a', 'b', 'c'
        ];

        array_push(...$array);

        $this->assertSame(
            $array,
            [
                ['a', 'b', 'c'],
                'a', 'b', 'c'
            ]
        );
    }

    public function testMerge()
    {
        $array = [
            [1],
            [2],
            [3],
        ];

        $this->assertSame(array_merge(...$array), [1, 2, 3]);
    }

    public function testIntConvert()
    {
        $intConvert = function (int ... $var) {
            return $var;
        };

        $this->assertSame($intConvert('1', '2', '3'), [1, 2, 3]);
    }

    public function testClass()
    {
        $callback = function (EntityClass ... $var) {
            return $var;
        };

        $a = new EntityClass();
        $b = new EntityClass();

        $this->assertSame($callback($a, $b), [$a, $b]);
    }
}