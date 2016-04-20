<?php

class SplObjectStorageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider containsDataProvider
     * @param $value
     */
    public function testContains($value)
    {
        $obj = new \SplObjectStorage();

        $this->setExpectedException('PHPUnit_Framework_Error_Warning');

        $obj->contains($value);
    }

    public function containsDataProvider()
    {
        yield [true];
        yield [false];
        yield [1];
        yield ['1'];
        yield [[]];
    }
}
