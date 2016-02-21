<?php

class ArrayAccessTest extends \PHPUnit_Framework_TestCase
{
    public function testOffsetExistsIsset()
    {
        $mock = $this->getInstanceMock();

        $mock->expects($this->once())->method('offsetExists')->with('key');

        isset($mock['key']);
    }

    public function testIssetOffsetExists()
    {
        $mock = $this->getInstanceMock();

        $mock->expects($this->never())->method('offsetGet');
        $mock->expects($this->never())->method('offsetExists');

        array_key_exists('key', $mock);
    }

    public function testOffsetGet()
    {
        $mock = $this->getInstanceMock();

        $mock->expects($this->once())->method('offsetGet');
        $mock->expects($this->never())->method('offsetExists');

        $mock['key'];
    }

    public function testOffsetSet()
    {

    }

    public function testOffsetUnset()
    {
        $mock = $this->getInstanceMock();

        $mock->expects($this->once())->method('offsetUnset')->with('key');

        unset($mock['key']);
    }

    /**
     * @return ArrayAccess|PHPUnit_Framework_MockObject_MockObject
     */
    private function getInstanceMock()
    {
        return $this->getMockBuilder('ArrayAccess')->getMock();
    }
}