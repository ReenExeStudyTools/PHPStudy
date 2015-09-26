<?php

class VariadicTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $array = ['a'];
        $push = ['b', 'c'];
        array_push($array, ... $push);
        $this->assertSame($array, ['a', 'b', 'c']);
    }
}