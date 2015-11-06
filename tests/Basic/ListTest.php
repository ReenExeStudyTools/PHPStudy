<?php

class ListTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        list($a, list($b, $c, $d), $e) = [1, [2, 3, 4], 5];
        $this->assertTrue($a === 1);
        $this->assertTrue($b === 2);
        $this->assertTrue($c === 3);
        $this->assertTrue($d === 4);
        $this->assertTrue($e === 5);
    }

    public function testEmpty()
    {
        /**
         * Fatal error: Cannot use empty list

            list() = [];

         */
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Notice
     * @expectedExceptionMessage Undefined offset: 0
     */
    public function testEmptyArray()
    {
        list($a) = [];
    }

    public function testResult()
    {
        $source = [[1]];
        $result = list(list($one)) = $source;

        $this->assertSame($result, $source);
    }
}
