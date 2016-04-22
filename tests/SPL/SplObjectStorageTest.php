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

    /**
     * @dataProvider attachDataProvider
     * @param $value
     * @param $message
     */
    public function testAttach($value, $message)
    {
        $obj = new \SplObjectStorage();

        $this->setExpectedException('PHPUnit_Framework_Error_Warning', $message);

        $obj->attach($value);
    }

    public function attachDataProvider()
    {
        yield [true,    'SplObjectStorage::attach() expects parameter 1 to be object, boolean given'];
        yield [false,   'SplObjectStorage::attach() expects parameter 1 to be object, boolean given'];
        yield [1,       'SplObjectStorage::attach() expects parameter 1 to be object, integer given'];
        yield ['1',     'SplObjectStorage::attach() expects parameter 1 to be object, string given'];
        yield [[],      'SplObjectStorage::attach() expects parameter 1 to be object, array given'];
    }

    /**
     * @dataProvider detachDataProvider
     * @param $value
     * @param $message
     */
    public function testDetach($value, $message)
    {
        $obj = new \SplObjectStorage();

        $this->setExpectedException('PHPUnit_Framework_Error_Warning', $message);

        $obj->detach($value);
    }

    public function detachDataProvider()
    {
        yield [true,    'SplObjectStorage::detach() expects parameter 1 to be object, boolean given'];
        yield [false,   'SplObjectStorage::detach() expects parameter 1 to be object, boolean given'];
        yield [1,       'SplObjectStorage::detach() expects parameter 1 to be object, integer given'];
        yield ['1',     'SplObjectStorage::detach() expects parameter 1 to be object, string given'];
        yield [[],      'SplObjectStorage::detach() expects parameter 1 to be object, array given'];
    }

    public function test()
    {
        $storage = new \SplObjectStorage();

        $this->assertSame(false, $storage->contains($this));

        $storage->attach($this);

        $this->assertSame(true, $storage->contains($this));
        $this->assertSame(1, $storage->count());

        // attach again - success
        $storage->attach($this);
        $this->assertSame(1, $storage->count());

        $result = [];
        foreach ($storage as $item) {
            $result[] = $item;
        }

        $this->assertSame([$this], $result);

        $storage->detach($this);
        $this->assertSame(false, $storage->contains($this));
        $this->assertSame(0, $storage->count());
    }
}
