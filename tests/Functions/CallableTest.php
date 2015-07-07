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