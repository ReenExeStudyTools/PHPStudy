<?php


class ReflectionFunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testIntval()
    {
        $reflection = new \ReflectionFunction('intval');
        $this->assertSame($reflection->getName(), 'intval');
        $this->assertSame($reflection->getShortName(), 'intval');
        $this->assertSame($reflection->name, 'intval');

        $this->assertSame($reflection->getNumberOfParameters(), 2);
        $this->assertSame($reflection->getNumberOfRequiredParameters(), 1);

        $this->assertFalse($reflection->returnsReference());

        $this->assertFalse($reflection->getDocComment());
        $this->assertFalse($reflection->getFileName());
    }
}