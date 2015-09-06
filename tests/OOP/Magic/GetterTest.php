<?php

use ReenExe\Study\OOP\Magic\MagicTrueGetter;
use ReenExe\Study\OOP\Magic\MagicStringGetter;

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

    public function testString()
    {
        $magic = new MagicStringGetter();
        $this->assertTrue($magic->id === 'id');
        $this->assertTrue($magic->key === 'key');
        $this->assertTrue($magic->name === 'name');
        $this->assertTrue($magic->value === 'value');
        $rand = (string) rand();
        $this->assertTrue($magic->{$rand} === $rand);
    }
}
