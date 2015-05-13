<?php

class BasicTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $array = [];

        $array[] = 'value';

        $this->assertSame($array[0], 'value');

        $array[7] = 'prev';
        $array[] = 'next';

        $this->assertSame($array[8], 'next');
    }
}