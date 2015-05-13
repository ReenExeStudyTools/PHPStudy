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

    /**
     * @dataProvider assocSortProvider
     */
    public function testAssocSort(array $array, array $expect, array $reverse)
    {
        asort($array);
        $this->assertSame($array, $expect);

        arsort($array);
        $this->assertSame($array, $reverse);
    }

    public function assocSortProvider()
    {
        return [
            [
                [
                    3,
                    'y' => 5,
                    'x' => 1,
                    7,
                ],

                [
                    'x' => 1,
                    3,
                    'y' => 5,
                    7,
                ],

                [
                    1 => 7,
                    'y' => 5,
                    0 => 3,
                    'x' => 1,
                ],

            ],
        ];
    }
}