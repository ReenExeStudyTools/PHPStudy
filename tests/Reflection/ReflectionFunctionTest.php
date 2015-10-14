<?php


class ReflectionFunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testIntval()
    {
        $reflection = new \ReflectionFunction('intval');
        $this->assertSame($reflection->getName(), 'intval');
        $this->assertSame($reflection->getShortName(), 'intval');
        $this->assertSame($reflection->name, 'intval');

        /* @var $parameters ReflectionParameter[] */
        $parameters = $reflection->getParameters();
        $this->assertTrue(is_array($parameters));

        $this->assertSame(count($parameters), 2);
        $this->assertSame($reflection->getNumberOfParameters(), 2);
        $this->assertSame($reflection->getNumberOfRequiredParameters(), 1);

        $this->assertFalse($reflection->returnsReference());

        $this->assertFalse($reflection->getDocComment());
        $this->assertFalse($reflection->getFileName());

        /* @var $varParam ReflectionParameter */
        $varParam = $parameters[0];
        $this->assertSame($varParam->getName(), 'var');
        $this->assertFalse($varParam->isOptional());

        /* @var $baseParam ReflectionParameter */
        $baseParam = $parameters[1];
        $this->assertSame($baseParam->getName(), 'base');
        $this->assertTrue($baseParam->isOptional());
    }
}