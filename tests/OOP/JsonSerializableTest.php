<?php

class JsonSerializableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $data
     * @param $json
     */
    public function test($data, $json)
    {
        $instance = new \ReenExe\Study\JsonSerializableInstance($data);

        $this->assertTrue($json === json_encode($instance));
    }

    public function dataProvider()
    {
        return [
            [
                [], '[]'
            ],
            [
                ['key' => 'value'], '{"key":"value"}'
            ],
        ];
    }
}