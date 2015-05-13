<?php

class SortTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider sortProvider
     */
    public function testSort(array $array, array $expect, array $reverse)
    {
        sort($array);
        $this->assertSame($array, $expect);

        rsort($array);
        $this->assertSame($array, $reverse);
    }

    public function sortProvider()
    {
        return [
            [
                [3, 1, 2], [1, 2, 3], [3, 2, 1]
            ],

            [
                ['x' => 3, 'y' => 1, 'z' => 2], [1, 2, 3], [3, 2, 1]
            ],
        ];
    }
}