<?php

use ReenExe\Study\LoopClass;

class LoopClassTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $loopClass = new LoopClass();

        $array = [];

        foreach ($loopClass as $key => $value) {
            $array[$key] = $value;
        }

        $this->assertTrue($array === ['a' => 1, 'b' => 2, 'c' => 3]);
    }
}