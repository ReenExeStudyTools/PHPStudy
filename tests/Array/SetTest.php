<?php

class SetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider uniqueProvider
     * @param array $source
     * @param array $expected
     */
    public function testUnique(array $source, array $expected)
    {
        $this->assertTrue(array_unique($source) === $expected);
    }

    public function uniqueProvider()
    {
        return [
            [[1, 1, 1], [1]]
        ];
    }
}