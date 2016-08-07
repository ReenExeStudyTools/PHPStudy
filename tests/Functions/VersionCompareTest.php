<?php

class VersionCompareTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $source
     * @param $with
     * @param $operator
     * @param $expect
     */
    public function test($source, $with, $operator, $expect)
    {
        $this->assertSame($expect, version_compare($source, $with, $operator));
    }

    public function dataProvider()
    {
        return [
            [1, 1, '=', true],
            [1, 1, '>=', true],
            [1, 1, '<', false],
            ['7.2.1', '7.3', '<', true],
            ['7.2.1', '7.3.1', '<', true],
            ['7.3.2', '7.3.2', '>=', true],
            ['7.3.2', '7.3.1', '>=', true],
            ['7.3.*', '7.3.1', '>=', false],
            ['7.3.*', '7.3', '>=', false],
            ['7.3.*', '7', '>=', true],
            ['7.*', '7', '>=', false],
        ];
    }
}
