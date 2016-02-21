<?php

use ReenExe\Study\SerializableInterfaceImplementation;
use ReenExe\Study\SleepSerialize;

class SerializableInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $data
     * @param $serialize
     */
    public function test($data, $serialize)
    {
        $instance = new SerializableInterfaceImplementation($data);

        $this->assertSame($serialize, serialize($instance));

        /* @var $unserializeInstance SerializableInterfaceImplementation */
        $unserializeInstance = unserialize($serialize);

        $this->assertInstanceOf(SerializableInterfaceImplementation::class, $unserializeInstance);

        $this->assertSame($unserializeInstance->getData(), $data);
    }

    public function dataProvider()
    {
        return [
            [
                '',
                'C:49:"ReenExe\Study\SerializableInterfaceImplementation":7:{s:0:"";}'
            ],
            [
                [
                    'key' => 'value'
                ],
                'C:49:"ReenExe\Study\SerializableInterfaceImplementation":28:{a:1:{s:3:"key";s:5:"value";}}'
            ],
        ];
    }

    public function testInterfacePriority()
    {
        $data = [
            'key' => 'value'
        ];

        /* @var $mock SleepSerialize|PHPUnit_Framework_MockObject_MockObject */
        $mock = $this
            ->getMockBuilder(SleepSerialize::class)
            ->setConstructorArgs([$data])
            ->getMock();

        $mock
            ->expects($this->once())
            ->method('serialize');

        $mock
            ->expects($this->never())
            ->method('__sleep');

        serialize($mock);
    }
}
