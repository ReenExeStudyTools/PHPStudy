<?php

class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider trueChoose
     */
    public function testTrue($choose)
    {
        $this->assertTrue((bool) $choose);
    }

    public function trueChoose()
    {
        return [
            [true],
            [.1],
            [-1],
            [[1]],
            ['1'],
            [1],
            // and
            ['-0']
        ];
    }

    /**
     * @dataProvider falseChoose
     */
    public function testFalse($choose)
    {
        $this->assertFalse((bool) $choose);
    }

    public function falseChoose()
    {
        return [
            [0.0],
            [-0.0],
            [0],
            [-0],
            [''],
            ['0'],
            [[]],
            [null],
            [false],
        ];
    }
}