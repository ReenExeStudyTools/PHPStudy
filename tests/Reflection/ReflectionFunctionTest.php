<?php


class ReflectionFunctionTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $reflection = new \ReflectionFunction('intval');
        $this->assertSame($reflection->getName(), 'intval');
    }
}