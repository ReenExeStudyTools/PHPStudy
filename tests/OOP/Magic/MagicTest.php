<?php

use ReenExe\Study\OOP\Magic\MagicTrueGetter;
use ReenExe\Study\OOP\Magic\MagicSetter;
use ReenExe\Study\OOP\Magic\MagicStringGetter;
use ReenExe\Study\OOP\Magic\MagicTrueCall;

class MagicTest extends \PHPUnit_Framework_TestCase
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

    public function testTrueSetter()
    {
        $magic = new MagicSetter();
        $this->assertSame($magic->id = 'value', 'value');
        $this->assertSame($magic->code = 1, 1);
    }

    public function testCall()
    {
        $magic = new MagicTrueCall();
        $this->assertTrue($magic->get());
        $this->assertFalse(method_exists($magic, 'get'));
        $this->assertTrue($magic->execute());
        $this->assertFalse(method_exists($magic, 'execute'));
    }
}
