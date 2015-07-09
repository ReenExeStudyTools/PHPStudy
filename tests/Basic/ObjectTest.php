<?php

class ObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testScalar()
    {
        $obj = (object)'name';
        $this->assertTrue(is_object($obj));
        $this->assertTrue($obj->scalar === 'name');
        $this->assertTrue($obj instanceof \stdClass);
    }
}