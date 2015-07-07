<?php

class CallableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider standardList
     */
    public function testStandard($name)
    {
        $this->assertTrue(is_callable($name));

        $this->assertCallable($name);

        /**
         * But for this - have Parse error
         *
         * (callable) $name;
         */
    }

    public function testVariable()
    {
        $callback = function() {};

        $this->assertCallable($callback);
    }

    public function testClosure()
    {
        $variable = 5;

        $callable = function() use ($variable){
            return $variable;
        };

        $this->assertEquals($callable(), $variable);
    }

    public function testClosureReference()
    {
        $variable = 5;
        $square = function() use (&$variable) {
            $variable *= $variable;
        };
        $square();
        $this->assertEquals($variable, 25);
    }

    public function testClosureRecursive()
    {

    }

    public function standardList()
    {
        return [
            ['array_map'],
            ['array_filter'],
            ['intval'],
            ['is_callable'],
            ['get_class'],
            ['\ReenExe\Study\CallableFunction::staticFunction'],
            ['\\ReenExe\\Study\\CallableFunction::staticFunction'],
        ];
    }

    public function testArrayFormat()
    {
        $object = new \ReenExe\Study\CallableFunction();

        $this->assertCallable([$object, 'method']);
        $this->assertCallable([$object, 'staticFunction']);
    }

    public function testCallableParent()
    {
        $object = new \ReenExe\Study\CallableExtendFunction();

        $this->assertCallable([$object, 'method']);
        $this->assertCallable([$object, 'parent::method']);

        /**
         * but have error when parent::parent::method
         */
    }

    public function testCallableClass()
    {
        $callable = new \ReenExe\Study\CallableClass();
        $this->assertCallable($callable);
    }

    private function assertCallable(callable $function)
    {
        $this->assertTrue(true);
    }
}