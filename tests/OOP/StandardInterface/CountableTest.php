<?php

class CountableTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $data = [1, 2, 3];

        $instance = new \ReenExe\Study\CountableInstance($data);

        $this->assertTrue(count($data) === count($instance));

        $doubleCountInstance = new \ReenExe\Study\CountableInstance($instance);

        $this->assertTrue(count($data) === count($doubleCountInstance));
    }

    public function testOnlyCountMethod()
    {
        $data = [1, 2, 3];

        $instance = new \ReenExe\Study\SingleCountMethod($data);

        $this->assertTrue(count($instance) === 1);
    }

    public function testSizeOfCountMethod()
    {
        $data = [1, 2, 3];

        $instance = new \ReenExe\Study\SingleCountMethod($data);

        $this->assertTrue(sizeof($instance) === 1);
    }
}