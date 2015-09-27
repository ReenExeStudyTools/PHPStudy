<?php

class VariadicTest extends \PHPUnit_Framework_TestCase
{
    public function testPush()
    {
        $array = ['a'];
        $push = ['b', 'c'];
        array_push($array, ... $push);
        $this->assertSame($array, ['a', 'b', 'c']);
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
}