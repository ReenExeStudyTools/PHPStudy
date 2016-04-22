<?php

class SplObjectStorageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider containsDataProvider
     * @param $value
     * @param $message
     */
    public function testContains($value, $message)
    {
        $obj = new \SplObjectStorage();

        $this->setExpectedException('PHPUnit_Framework_Error_Warning', $message);

        $obj->contains($value);
    }

    public function containsDataProvider()
    {
        yield [true,    'SplObjectStorage::contains() expects parameter 1 to be object, boolean given'];
        yield [false,   'SplObjectStorage::contains() expects parameter 1 to be object, boolean given'];
        yield [1,       'SplObjectStorage::contains() expects parameter 1 to be object, integer given'];
        yield ['1',     'SplObjectStorage::contains() expects parameter 1 to be object, string given'];
        yield [[],      'SplObjectStorage::contains() expects parameter 1 to be object, array given'];
    }
}