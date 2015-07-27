<?php

class FunctionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider mergeProvider
     */
    public function testMerge(array $arrayOfArray, array $expected)
    {
        $this->assertTrue(call_user_func_array('array_merge', $arrayOfArray) === $expected);
    }

    public function mergeProvider()
    {
        return [
            [
                [
                    [1], [2], [3]
                ],
                [1, 2, 3]
            ]
        ];
    }
}