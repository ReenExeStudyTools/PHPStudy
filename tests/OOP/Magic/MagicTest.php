<?php

use ReenExe\Study\OOP\Magic\MagicTrueGetter;
use ReenExe\Study\OOP\Magic\MagicSetter;
use ReenExe\Study\OOP\Magic\MagicStringGetter;
use ReenExe\Study\OOP\Magic\MagicTrueCall;
use ReenExe\Study\OOP\Magic\IssetUnsetInstance;

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

    public function testCallStatic()
    {
        $this->assertSame(MagicTrueCall::call(), null);
        $this->assertSame(MagicTrueCall::call('end', [1, 2, 3]), 3);
        $this->assertSame(MagicTrueCall::call('current', [1, 2, 3]), 1);
        $this->assertSame(MagicTrueCall::call('max', 1, 2, 3), 3);
    }

    public function testIssetUnset()
    {
        $instance = new IssetUnsetInstance([]);

        foreach (['value', 'id', 'name', 'parent.gender.id'] as $property) {
            $this->assertFalse(isset($instance->date));

            $instance->$property = 'some-value';

            $this->assertTrue(isset($instance->$property));

            unset($instance->$property);

            $this->assertFalse(isset($instance->$property));
        }
    }
}
