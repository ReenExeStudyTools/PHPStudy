<?php

use ReenExe\Study\EntityClass;

class SetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider uniqueScalarProviderSortString
     * @param array $source
     * @param array $expected
     */
    public function testUniqueSortString(array $source, array $expected)
    {
        $this->assertTrue(array_unique($source) === $expected);
        $this->assertTrue(array_unique($source, SORT_STRING) === $expected);
    }

    /**
     * @dataProvider uniqueObjectProvider
     * @param array $source
     * @param array $expected
     */
    public function testUniqueObject(array $source, array $expected)
    {
        /**
         * Fatal error:  Object of class ReenExe\Study\EntityClass could not be converted to string
            $this->assertTrue(array_unique($source) === $expected);
         */
    }

    public function uniqueObjectProvider()
    {
        $a = new EntityClass();
        $b = new EntityClass();

        yield [
            [$a, $a, $b, $a, $b],
            [$a, $b]
        ];
    }

    public function uniqueScalarProviderSortString()
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

    public function testIntersect()
    {
        /**
         * Note: Two elements are considered equal
         * if and only if (string) $elem1 === (string) $elem2.
         * In words: when the string representation is the same.
         */

        $this->assertTrue(array_intersect([], []) === []);
        $this->assertTrue(array_intersect([1], []) === []);
        $this->assertTrue(array_intersect([1, 2, 3], [5, 7, 8])  === []);
        $this->assertTrue(array_intersect([1], [1]) === [1]);
        $this->assertTrue(array_intersect(['a', 'b', 'c'], ['b', 'c', 'd']) === [1 => 'b', 2 => 'c']);
        $this->assertTrue(array_intersect(['a' => 1], ['b' => 1], ['c' => 1]) === ['a' => 1]);
        $this->assertTrue(array_intersect(['a' => true], ['b' => 1], ['c' => 1]) === ['a' => true]);
    }

    public function testIntersectAssoc()
    {
        $this->assertTrue(array_intersect_assoc([], []) === []);

        $this->assertTrue(array_intersect_assoc(['1'], [1], [true]) === ['1']);
        $this->assertTrue(array_intersect_assoc(['a' => 1], ['b' => 1], ['c' => 1]) === []);

        $this->assertTrue(array_intersect_assoc([1 => 'a', 2 => 'b'], [1 => 'a', 3 => 'b']) === [1 => 'a']);
    }
}