<?php

use ReenExe\Study\SerializableInterfaceImplementation;

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
}
