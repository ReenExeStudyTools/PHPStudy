<?php

class CallableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider standardList
     */
    public function testStandard($name)
    {
        $this->assertTrue(is_callable($name));
    }

    public function standardList()
    {
        return [
            ['array_map'],
            ['array_filter'],
            ['intval'],
            ['is_callable'],
            ['get_class'],
            ['\ReenExe\Study\CallableFunction::LittleFunction'],
            ['\\ReenExe\\Study\\CallableFunction::LittleFunction'],
        ];
    }
}