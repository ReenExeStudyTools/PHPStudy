<?php

class CreateTest extends \PHPUnit_Framework_TestCase
{
    public function testEqual()
    {
        $a = new \stdClass();
        $b = new \stdClass();
        $this->assertTrue($a == $b);
        $this->assertTrue($a !== $b);

        $a->value = $b->value = 'value';
        $this->assertTrue($a == $b);
        $this->assertTrue($a !== $b);

        $a->value = 1;
        $b->value = 2;
        $this->assertTrue($a != $b);
    }

    public function testString()
    {
        $instance1 = new \ReenExe\Study\SimpleClass();

        $instance2 = new $instance1();

        $this->assertTrue($instance1 == $instance2);
        $this->assertTrue($instance1 !== $instance2);

        $this->assertInstanceOf(\ReenExe\Study\SimpleClass::class, $instance1);
        $this->assertInstanceOf(\ReenExe\Study\SimpleClass::class, $instance2);
    }
}