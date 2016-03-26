<?php

use ReenExe\Study\OOP\TraitSpace\SimpleClass;
use ReenExe\Study\OOP\TraitSpace\SimpleTrait;
use ReenExe\Study\OOP\TraitSpace\TraitTypeArgumentClass;
use ReenExe\Study\OOP\TraitSpace\TraitTypeArgument;
use ReenExe\Study\OOP\TraitSpace\AbstractTraitClass;
use ReenExe\Study\OOP\TraitSpace\TraitImplementCountableClass;
use ReenExe\Study\OOP\TraitSpace\PrivatePropertyAccessClass;
use ReenExe\Study\OOP\TraitSpace\TraitUseTraitClass;
use ReenExe\Study\OOP\TraitSpace\TraitUseTraitPrivatePropertyClass;

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
        $this->assertSame(class_uses($instance), [SimpleTrait::class => SimpleTrait::class]);
    }

    public function testTraitTypeArgument()
    {
        /**
         * Fatal error:
         *  Uncaught TypeException:
         *      Argument 1 passed to ReenExe\Study\OOP\TraitSpace\TraitTypeArgumentClass::replace() must be an instance of ReenExe\Study\OOP\TraitSpace\TraitTypeArgument,
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

    public function testTraitImplementInterface()
    {
        $instance = new TraitImplementCountableClass();
        $this->assertSame(count($instance), 0);

        $instance->add('a');
        $this->assertSame(count($instance), 1);

        $instance->add('b', 'c');
        $this->assertSame(count($instance), 3);
    }

    public function testPrivatePropertyAccess()
    {
        $instance = new PrivatePropertyAccessClass();

        $this->assertSame($instance->getTraitPrivateValue(), 'this is trait private propery');
    }

    public function testTraitUseTrait()
    {
        $instance = new TraitUseTraitClass();

        $instance->setValue('some');

        $this->assertSame($instance->getValue(), 'some');
    }

    public function testGetParentTraitPrivateProperty()
    {
        $instance = new TraitUseTraitPrivatePropertyClass();

        $instance->setValue('some');

        $this->assertSame($instance->getParentTraitPrivateProperty(), 'some');
    }
}