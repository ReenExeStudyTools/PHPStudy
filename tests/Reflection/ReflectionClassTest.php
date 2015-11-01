<?php

class ReflectionClassTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $self = new ReflectionClass('ReflectionClass');
        $this->assertSame('ReflectionClass', $self->name);
        $this->assertSame('ReflectionClass', $self->getName());
        $this->assertTrue($self->isInternal());

        $this->assertSame('', $self->getNamespaceName());

        $this->assertFalse($self->isAbstract());
        $this->assertFalse($self->isInterface());
        $this->assertFalse($self->isFinal());

        $this->assertTrue($self->hasConstant('IS_FINAL'));
        $this->assertSame(ReflectionClass::IS_FINAL, $self->getConstant('IS_FINAL'));
        $constants = [
            'IS_IMPLICIT_ABSTRACT' => ReflectionClass::IS_IMPLICIT_ABSTRACT,
            'IS_EXPLICIT_ABSTRACT' => ReflectionClass::IS_EXPLICIT_ABSTRACT,
            'IS_FINAL' => ReflectionClass::IS_FINAL,
        ];
        $this->assertSame($constants, $self->getConstants());

        $this->assertFalse($self->isIterateable());

        $method = $self->getMethod('getMethod');
        $this->assertSame('ReflectionClass', $method->class);
        $this->assertSame('getMethod', $method->name);
        $this->assertSame(ReflectionMethod::IS_PUBLIC, $method->getModifiers());
    }
}
