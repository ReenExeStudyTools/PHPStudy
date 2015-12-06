<?php

use ReenExe\Study\MethodStaticVariableClass;

class MethodStaticVariableClassTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $a = new MethodStaticVariableClass();
        $b = new MethodStaticVariableClass();

        $this->assertEmpty($a->setAndGet());
        $this->assertEmpty($b->setAndGet());

        $a->setAndGet(true);

        $this->assertTrue($a->setAndGet());
        $this->assertTrue($b->setAndGet());

        $b->setAndGet('other');

        $this->assertSame($a->setAndGet(), $b->setAndGet());
    }
}