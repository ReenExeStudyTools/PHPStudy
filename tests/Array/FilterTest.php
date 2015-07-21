<?php

class FilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test(array $source, array $expected)
    {
        $this->assertTrue(array_filter($source) === $expected);
    }

    public function dataProvider()
    {
        return [
            [
                [], []
            ],
        ];
    }
}