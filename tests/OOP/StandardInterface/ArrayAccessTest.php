<?php

class ArrayAccessTest extends \PHPUnit_Framework_TestCase
{
    public function testOffsetExists()
    {

    }

    public function testOffsetGet()
    {
        /* @var $mock ArrayAccess|PHPUnit_Framework_MockObject_MockObject */
        $mock = $this->getMockBuilder('ArrayAccess')->getMock();

        $mock->expects($this->once())->method('offsetGet');
        $mock->expects($this->never())->method('offsetExists');

        $mock[1];
    }

    public function testOffsetSet()
    {

    }

    public function testOffsetUnset()
    {

    }
}