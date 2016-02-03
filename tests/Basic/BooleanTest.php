<?php

class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider trueChoose
     * @param $choose
     */
    public function testTrue($choose)
    {
        $this->assertTrue((bool)$choose);
    }

    public function trueChoose()
    {
        return [
            [true],
            [.1],
            [-1],
            [[1]],
            [[[]]],
            ['1'],
            [1],
            // and
            ['-0']
        ];
    }

    /**
     * @dataProvider falseChoose
     * @param $choose
     */
    public function testFalse($choose)
    {
        $this->assertFalse((bool)$choose);
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
            [array()],
            [null],
            [false],
        ];
    }
}