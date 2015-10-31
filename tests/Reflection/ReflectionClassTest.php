<?php

class ReflectionClassTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $self = new ReflectionClass('ReflectionClass');
        $constants = [
            'IS_IMPLICIT_ABSTRACT' => ReflectionClass::IS_IMPLICIT_ABSTRACT,
            'IS_EXPLICIT_ABSTRACT' => ReflectionClass::IS_EXPLICIT_ABSTRACT,
            'IS_FINAL' => ReflectionClass::IS_FINAL,
        ];
        $this->assertSame($constants, $self->getConstants());
    }
}
