<?php

class SetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider uniqueProviderSortString
     * @param array $source
     * @param array $expected
     */
    public function testUniqueSortString(array $source, array $expected)
    {
        $this->assertTrue(array_unique($source) === $expected);
        $this->assertTrue(array_unique($source, SORT_STRING) === $expected);
    }

    public function uniqueProviderSortString()
    {
        return [
            [
                [1, 1, 1],
                [1]
            ],
            [
                [1 => 1, 1, 1],
                [1 => 1]
            ],
            [
                [1, 1, 1, 'value'],
                [1, 3 => 'value']
            ],
            [
                ['a' => 1, 1, 1],
                ['a' => 1]
            ],

            [
                [1, true, '1'],
                [1]
            ],
            [
                [true, '1'],
                [true]
            ],
            [
                ['1', 1],
                ['1']
            ],

            [
                [0, false, null, ''],
                [0, false]
            ],
            [
                [0, '', false, null],
                [0, '']
            ],
            [
                [0, null, '', false],
                [0, null]
            ],

            [
                [false, null, ''],
                [false]
            ],
            [
                [null, false, ''],
                [null]
            ],
            [
                ['', null, false],
                ['']
            ],

            [
                [1, '1', 2 => '2', 2, 4 => 3, '3'],
                [1, 2 => '2', 4 => 3]
            ]
        ];
    }

    /**
     * @dataProvider uniqueProviderSortNumeric
     * @param array $source
     * @param array $expected
     */
    public function testUniqueSortNumeric(array $source, array $expected)
    {
        $this->assertTrue(array_unique($source, SORT_NUMERIC) === $expected);
    }

    public function uniqueProviderSortNumeric()
    {
        return [
            [
                [1, '1', '1value', 'value'],
                [1, 3 => 'value']
            ],
            [
                ['1value', '1key'],
                ['1value']
            ],
            [
                ['1value', 1],
                ['1value']
            ],
        ];
    }

    public function testDiff()
    {
        /**
         * Note: Two elements are considered equal
         * if and only if (string) $elem1 === (string) $elem2.
         * In words: when the string representation is the same.
         */

        $this->assertTrue(array_diff([], []) === []);
        $this->assertTrue(array_diff([1], []) === [1]);
        $this->assertTrue(array_diff(['a' => 1], []) === ['a' => 1]);
        $this->assertTrue(array_diff([1 => 1], []) === [1 => 1]);
        $this->assertTrue(array_diff([1, 2, 3], []) === [1, 2, 3]);

        $this->assertTrue(array_diff(['a', 'b', 'c'], ['d'], ['e']) === ['a', 'b', 'c']);
        $this->assertTrue(array_diff(['a', 'b', 'c'], ['a'], ['b'], ['c']) === []);
        $this->assertTrue(array_diff(['a', 'b', 'c'], ['a', 'b'], ['c']) === []);
        $this->assertTrue(array_diff(['a', 'b', 'c'], ['a', 'b']) === [2 => 'c']);

        $this->assertTrue(array_diff(['1', true], [1]) === []);
        $this->assertTrue(array_diff([0, null, '', false, '0'], ['']) === [0, 4 => '0']);
        $this->assertTrue(
            array_diff([0, null, '', false, '0'], [0]) === [1 => null, 2 => '', 3 => false]
        );
    }
    /**
     * TODO: SORT_REGULAR
     * TODO: array_intersect
     * TODO: array_diff
     */
}