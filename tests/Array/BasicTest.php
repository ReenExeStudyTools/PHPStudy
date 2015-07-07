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

    public function testNumeration()
    {
        $array = [
            '1' => 'One', 1 => 'Two', 'Three', 2 => 'Four'
        ];

        $this->assertTrue($array === [1 => 'Two', 2 => 'Four']);
    }
}