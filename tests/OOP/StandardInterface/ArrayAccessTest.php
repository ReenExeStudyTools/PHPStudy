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
        $mock->expects($this->never())->method('offsetSet');
        $mock->expects($this->never())->method('offsetUnset');

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
        $mock = $this->getInstanceMock();

        $mock->expects($this->once())->method('offsetSet')->with('key', 'value');

        $mock['key'] = 'value';
    }

    public function testOffsetNativePush()
    {
        $mock = $this->getInstanceMock();

        $mock->expects($this->once())->method('offsetSet')->with(null, 'value');

        $mock[] = 'value';
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage array_push() expects parameter 1 to be array, object given
     */
    public function testOffsetArrayPush()
    {
        $mock = $this->getInstanceMock();

        array_push($mock, 'value');
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