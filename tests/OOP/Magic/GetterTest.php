<?php

use ReenExe\Study\OOP\Magic\MagicTrueGetter;

class GetterTest extends \PHPUnit_Framework_TestCase
{
    public function testTrue()
    {
        $magic = new MagicTrueGetter();
        $this->assertTrue($magic->id);
        $this->assertTrue($magic->key);
        $this->assertTrue($magic->name);
        $this->assertTrue($magic->value);
        $this->assertTrue($magic->{rand()});
    }
}