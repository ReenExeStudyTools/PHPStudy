<?php

class SerializableInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $data
     * @param $serialize
     */
    public function test($data, $serialize)
    {
        $instance = new \ReenExe\Study\SerializableInterfaceImplementation($data);

        $this->assertSame($serialize, serialize($instance));
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
