<?php

use ReenExe\Study\OOP\TraitSpace\SimpleClass;

class TraitTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $instance = new SimpleClass();

        $instance->setTraitValue('some');

        $this->assertSame($instance->getTraitValue(), 'some');
    }
}