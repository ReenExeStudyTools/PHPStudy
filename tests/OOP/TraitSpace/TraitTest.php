<?php

use ReenExe\Study\OOP\TraitSpace\SimpleClass;
use ReenExe\Study\OOP\TraitSpace\SimpleTrait;
use ReenExe\Study\OOP\TraitSpace\TraitTypeArgumentClass;
use ReenExe\Study\OOP\TraitSpace\TraitTypeArgument;
use ReenExe\Study\OOP\TraitSpace\AbstractTraitClass;

class TraitTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $instance = new SimpleClass();

        $instance->setValue('some');

        $this->assertSame($instance->getValue(), 'some');
    }

    public function testInstanceOf()
    {
        $instance = new SimpleClass();
        $this->assertTrue($instance instanceof SimpleClass);
        $this->assertFalse($instance instanceof SimpleTrait);
    }

    public function testTraitTypeArgument()
    {
        /**
         * Fatal error:
         *  Uncaught TypeException:
         *      Argument 1 passed to ReenExe\Study\OOP\TraitSpace\TraitTypeArgumentClass::replace() must be an instance of ReenExe\Study\OOP\TraitSpace\SimpleTrait,
         *      instance of ReenExe\Study\OOP\TraitSpace\TraitTypeArgumentClass given
            $instance = new TraitTypeArgumentClass();
            $instance->replace($instance);
         */
    }

    public function testAbstractTrait()
    {
        /**
         * Parse error: syntax error
            new AbstractTraitClass();
         */
    }
}