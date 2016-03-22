<?php

class SortTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider sortProvider
     * @param array $array
     * @param array $expect
     * @param array $reverse
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
            [[], [], []],
            [
                [3, 1, 2], [1, 2, 3], [3, 2, 1]
            ],

            [
                ['x' => 3, 'y' => 1, 'z' => 2], [1, 2, 3], [3, 2, 1]
            ],
        ];
    }

    /**
     * @dataProvider sortOptionDataProvider
     * @param array $array
     * @param $options
     * @param array $expect
     */
    public function testSortOption(array $array, $options, array $expect)
    {
        sort($array, $options);
        $this->assertSame($array, $expect);
    }

    public function sortOptionDataProvider()
    {
        yield [
            [11, 2],
            SORT_STRING,
            [11, 2]
        ];

        yield [
            [11, 2],
            SORT_NUMERIC,
            [2, 11]
        ];

        yield [
            [11, 2],
            null,
            [2, 11]
        ];

        yield [
            [11, 2],
            SORT_REGULAR,
            [2, 11]
        ];

        yield [
            ['11', '2'],
            SORT_REGULAR,
            ['2', '11']
        ];

        yield [
            ['11', '2'],
            SORT_STRING,
            ['11', '2']
        ];

        yield [
            ['11', '2'],
            SORT_NUMERIC,
            ['2', '11']
        ];

        // drop keys
        yield [
            ['a' => '11', 'b' => '2'],
            SORT_NUMERIC,
            ['2', '11']
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
                    /* 0 => */3,
                    'y' => 5,
                    /* 1 => */9,
                    'x' => 1,
                    /* 2 => */7,
                ],

                [
                    'x' => 1,
                    3,
                    'y' => 5,
                    2 => 7,
                    1 => 9,
                ],

                [
                    1 => 9,
                    2 => 7,
                    'y' => 5,
                    0 => 3,
                    'x' => 1,
                ],

            ],
        ];
    }

    public function testSortSuccess()
    {
        $array = ['x' => 'y', 'i' => 'j'];

        $this->assertTrue(sort($array));
        $this->assertTrue(rsort($array));
        $this->assertTrue(asort($array));
        $this->assertTrue(arsort($array));
    }

    /**
     * @dataProvider scalarDataProvider
     */
    public function testSortFail($data)
    {
        $this->assertFalse(@sort($data));
        $this->assertFalse(@rsort($data));
        $this->assertFalse(@asort($data));
        $this->assertFalse(@arsort($data));
    }

    public function scalarDataProvider()
    {
        return [
            ['value'],
            [77],
            [false],
            [null],
        ];
    }

    /**
     * @dataProvider userSortDataProvider
     * @param array $array
     * @param callable $callable
     * @param array $expect
     */
    public function testUserSort(array $array, callable $callable, array $expect)
    {
        usort($array, $callable);
        $this->assertSame($array, $expect);
    }

    public function userSortDataProvider()
    {
        yield [
            [],
            'max',
            []
        ];

        yield [
            [1, 2, 3],
            function ($a, $b) {
                return $a <=> $b;
            },
            [1, 2, 3]
        ];

        $length = function ($a, $b) {
            return strlen($a) <=> strlen($b);
        };

        yield [
            ['one', 'two', 'three'],
            $length,
            ['one', 'two', 'three']
        ];

        yield [
            ['five', 'six'],
            $length,
            ['six', 'five']
        ];

        yield [
            [['five'], ['six']],
            'array_merge',
            [['six'], ['five']]
        ];
    }
}