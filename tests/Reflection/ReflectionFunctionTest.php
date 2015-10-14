<?php


class ReflectionFunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testIntval()
    {
        $reflection = new \ReflectionFunction('intval');
        $this->assertSame($reflection->getName(), 'intval');

        $this->assertSame($reflection->getNumberOfParameters(), 2);
    }
}