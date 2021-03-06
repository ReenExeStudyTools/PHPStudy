<?php

/**
 * array_key_exists
 * array_values
 * array_keys
 * in_array
 * array_search
 * array_merge
 * array_merge_recursive
 * array_flip
 * array_map
 * array_combine
 * array_count_values
 * array_slice
 * array_chunk
 * array_fill
 * array_fill_keys
 * array_column
 * array_change_key_case
 * array_pad
 * array_splice
 * array_replace
 * array_replace_recursive
 * count
 */

class FunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testValues()
    {
        $this->assertTrue(array_values([]) === []);
        $this->assertTrue(array_values(['key' => 'value']) === ['value']);
    }

    public function testKeys()
    {
        $this->assertSame(array_keys([]), []);
        $this->assertSame(array_keys([1 => 'a', 2 => 'b' ]), [1, 2]);
        $this->assertSame(array_keys(['1' => 'a', '2' => 'b' ]), [1, 2]);
        $this->assertSame(array_keys(['a' => 1, 'b' => 2]), ['a', 'b']);
    }

    public function testSearchKeys()
    {
        $this->assertSame(array_keys([1], 1), [0]);
        $this->assertSame(array_keys(['a' => 1, 'b' => 2], 2), ['b']);
        $this->assertSame(array_keys(['a' => 1, 'b' => 2], 2, true), ['b']);

        $this->assertSame(array_keys(['a' => 1, 'b' => 2], '2'), ['b']);
        $this->assertSame(array_keys(['a' => 1, 'b' => 2], '2', true), []);

        $this->assertSame(array_keys(['a' => 1, 'b' => ['search']], ['search']), ['b']);
        $this->assertSame(array_keys(['a' => 1, 'b' => ['x' => 'search']], ['y' => 'search']), []);
    }

    public function testInArray()
    {
        $this->assertTrue(in_array(1, [1]));
        $this->assertTrue(in_array(1, [1], $strict = true));
        $this->assertTrue(in_array(1, ['1'], $strict = true) === false);
    }

    public function testSearch()
    {
        $this->assertTrue(array_search(1, ['1']) === 0);
        $this->assertTrue(array_search(1, ['key' => '1']) === 'key');
        $this->assertTrue(array_search(1, ['1'], $strict = true) === false);
    }

    public function testArrayKeyExist()
    {
        $array = ['key' => null];
        $this->assertTrue(array_key_exists('key', $array));
        $this->assertFalse(isset($array['key']));
    }

    public function testMerge()
    {
        // can merge one params
        $this->assertTrue(array_merge([1]) === [1]);
        // flush numeric keys
        $this->assertTrue(array_merge([1 => 1]) === [1]);
        // stay assoc keys
        $this->assertTrue(array_merge(['k' => 'v']) === ['k' => 'v']);
        $this->assertTrue(array_merge([1], [2]) === [1, 2]);
        $this->assertTrue(array_merge(['x'], ['y'], ['z']) === ['x', 'y', 'z']);
        // flush numeric keys
        $this->assertTrue(
            array_merge([1 => 'a'], [2 => 'b'], [3 => 'c']) === ['a', 'b', 'c']
        );

        // on double key - use last pair key-value
        $this->assertTrue(
            array_merge(['a' => 1], ['a' => 3], ['a' => 2]) === ['a' => 2]
        );

        // stay first key sequence
        $this->assertTrue(
            array_merge([1, 2, 3, 'a' => 4], [1, 2, 7, 'b' => 8], ['a' => 'x', 'b' => 'y']) === [1, 2, 3, 'a' => 'x', 1, 2, 7, 'b' => 'y']
        );
    }

    public function testMergeRecursive()
    {
        // can merge one params
        $this->assertTrue(array_merge_recursive([1]) === [1]);
        // flush numeric keys
        $this->assertTrue(array_merge_recursive([1 => 1]) === [1]);
        // stay assoc keys
        $this->assertTrue(array_merge_recursive(['k' => 'v']) === ['k' => 'v']);
        $this->assertTrue(array_merge_recursive([1], [2]) === [1, 2]);
        $this->assertTrue(array_merge_recursive(['x'], ['y'], ['z']) === ['x', 'y', 'z']);
        // flush numeric keys
        $this->assertTrue(
            array_merge_recursive([1 => 'a'], [2 => 'b'], [3 => 'c']) === ['a', 'b', 'c']
        );

        // on double key - convert to array
        $this->assertTrue(
            array_merge_recursive(['a' => 1], ['a' => 3], ['a' => 2]) === ['a' => [1, 3, 2]]
        );

        // numeric keys
        $this->assertTrue(
            array_merge_recursive([ 1 => ['a' => 1]], [ 2 => ['a' => 2]]) === [['a' => 1], ['a' => 2]]
        );

        // depth
        $this->assertTrue(
            array_merge_recursive([ 'x' => ['a' => 1]], [ 'x' => ['a' => 2]]) === ['x' => ['a' => [1, 2]]]
        );
        $this->assertTrue(
            array_merge_recursive([ 'x' => ['a' => [1]]], [ 'x' => ['a' => [2]]]) === ['x' => ['a' => [1, 2]]]
        );

        // stay nested `as is`
        $this->assertSame(array_merge_recursive([[[1]]]), [[[1]]]);
    }

    public function testDefaultAndRecursiveMerge()
    {
        $a = [
            1,
            2,
            'a' => [
                'b' => 3
            ]
        ];

        $b = [
            3,
            4,
            'a' => [
                'b' => 5,
                'c' => 7,
            ]
        ];

        $result = [
            1,
            2,
            'a' => [
                'b' => 5,
                'c' => 7,
            ],
            3,
            4,
        ];

        $recursive = [
            1,
            2,
            'a' => [
                'b' => [3, 5],
                'c' => 7,
            ],
            3,
            4,
        ];

        $this->assertSame(array_merge($a, $b), $result);
        $this->assertSame(array_merge_recursive($a, $b), $recursive);
    }

    public function testFlip()
    {
        $this->assertTrue(array_flip([1]) === [1 => 0]);
        $this->assertTrue(array_flip([1 => 'a']) === ['a' => 1]);

        // use last key
        $this->assertTrue(array_flip([1, 1]) === [1 => 1]);
        $this->assertTrue(array_flip(['a' => 1, 'b' => 1]) === [1 => 'b']);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage array_flip(): Can only flip STRING and INTEGER values!
     */
    public function testFlipIncorrectValueArrayAsKey()
    {
        array_flip(['a' => array()]);
    }

    public function testCombine()
    {
        // simple
        $this->assertTrue(array_combine([1, 2, 3], ['a', 'b', 'c']) === [1 => 'a', 2 => 'b', 3 => 'c']);

        // on key double use last value
        $this->assertTrue(array_combine([1, 1, 1], ['a', 'b', 'c']) === [1 => 'c']);

        // for fun
        $this->assertTrue(array_combine([], []) === []);

        $array = [
            'a' => 1,
            'b' => 8,
            'c' => 27,
        ];

        $this->assertTrue(
            array_combine(array_keys($array), array_values($array)) === $array
        );

        $this->assertTrue(
            array_combine(array_keys($array), $array) === $array
        );

        $this->assertTrue(
            array_combine(array_values($array), array_keys($array)) === array_flip($array)
        );

        $this->assertTrue(
            array_combine($array, array_keys($array)) === array_flip($array)
        );
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Both parameters should have an equal number of elements
     */
    public function testCombineWithDifferentLength()
    {
        array_combine([1, 2], [3]);
    }

    public function testCombineWithDifferentLengthResult()
    {
        // for fun
        $this->assertTrue(@array_combine([1, 2], [3]) === false);

        $this->assertTrue(@array_combine([1, 1], [3]) === false);
    }

    public function testArrayCountValues()
    {
        $this->assertTrue(
            array_count_values([]) === []
        );

        $this->assertTrue(
            array_count_values(['a', 'b']) === ['a' => 1, 'b' => 1]
        );

        $this->assertTrue(
            array_count_values(['a', 'b', 'a', 'c']) === ['a' => 2, 'b' => 1, 'c' => 1]
        );
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage array_count_values(): Can only count STRING and INTEGER values!
     */
    public function testArrayCountValuesIncorrect()
    {
        array_count_values([ 'key' => [] ]);
    }

    public function testArrayCountValuesIncorrectResult()
    {
        $this->assertTrue(
            @array_count_values([['this is array'], 'b', 'a']) === ['b' => 1, 'a' => 1]
        );
    }

    public function testSlice()
    {
        $assoc = ['a' => 1, 'b' => 2, 'c' => 3];

        $this->assertTrue(array_slice($assoc, 0) === $assoc);
        $this->assertTrue(array_slice($assoc, 0, 1) === ['a' => 1]);
        $this->assertTrue(array_slice($assoc, 1) === ['b' => 2, 'c' => 3]);
        // more than exists
        $this->assertTrue(array_slice($assoc, 1, 100) === ['b' => 2, 'c' => 3]);

        $this->assertTrue(array_slice($assoc, 1, 1) === ['b' => 2]);

        $array = [1, 2, 3, 4, 5, 6, 7, 8];

        $this->assertTrue(array_slice($array, 0) === $array);
        $this->assertTrue(array_slice($array, 0, 8, true) === $array);

        // more than exists
        $this->assertTrue(array_slice($array, 0, 100, true) === $array);

        $this->assertTrue(array_slice($array, 1, 1) === [2]);

        // falsy
        $this->assertTrue(array_slice($array, 1, 1, 0) === [2]);
        $this->assertTrue(array_slice($array, 1, 1, false) === [2]);
        $this->assertTrue(array_slice($array, 1, 1, '') === [2]);

        // truthy
        $this->assertTrue(array_slice($array, 1, 1, true) === [1 => 2]);
        $this->assertTrue(array_slice($array, 1, 1, 1) === [1 => 2]);
        $this->assertTrue(array_slice($array, 1, 1, -1) === [1 => 2]);
        $this->assertTrue(array_slice($array, 1, 1, 'value') === [1 => 2]);

        $this->assertTrue(array_slice($array, 1, 2, true) === [1 => 2, 2 => 3]);

        $hybrid = ['a' => 2, 1, 'c' => 5, 6, 8 => 9];
        $this->assertTrue(array_slice($hybrid, 0, 2) === ['a' => 2, 1]);
        $this->assertTrue(array_slice($hybrid, 0, 2, true) === ['a' => 2, 1]);

        $this->assertTrue(array_slice($hybrid, 2, 2) === ['c' => 5, 6]);
        $this->assertTrue(array_slice($hybrid, 2, 2, true) === ['c' => 5, 1 => 6]);
        $this->assertTrue(array_slice($hybrid, 2, 3) === ['c' => 5, 6, 9]);
        $this->assertTrue(array_slice($hybrid, 2, 3, true) === ['c' => 5, 1 => 6, 8 => 9]);
    }

    public function testChunk()
    {
        $hybrid = ['a' => 1, 'b' => 2, 'c' => 3, 5, 6];

        $this->assertTrue(array_chunk($hybrid, 1) === [[1], [2], [3], [5], [6]]);
        $this->assertTrue(array_chunk($hybrid, 2) === [[1, 2], [3, 5], [6]]);

        $this->assertTrue(array_chunk($hybrid, 1, true) === [['a' => 1], ['b' => 2], ['c' => 3], [5], [1 => 6]]);
        $this->assertTrue(array_chunk($hybrid, 2, true) === [['a' => 1, 'b' => 2], ['c' => 3, 5], [1 => 6]]);
    }

    public function testFill()
    {
        $this->assertTrue(array_fill(0, 3, 'value') === ['value', 'value', 'value']);
        $this->assertTrue(array_fill(1, 2, []) === [1 => [], 2 => []]);
        $this->assertTrue(array_fill(3, 3, []) === [3 => [], 4 => [], 5 => []]);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage array_fill() expects parameter 1 to be integer, string given
     */
    public function testFillFailStartIndex()
    {
        array_fill('fail', 1, 'value');
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage array_fill() expects parameter 2 to be integer, string given
     */
    public function testFillFailNum()
    {
        array_fill(1, 'fail', 'value');
    }

    public function testFillKeys()
    {
        $this->assertTrue(array_fill_keys([], true) === []);
        $this->assertTrue(array_fill_keys([1], true) === [1 => true]);
        $this->assertTrue(array_fill_keys(['a', 'b'], [1]) === ['a' => [1], 'b' => [1]]);
    }

    public function testMap()
    {
        $this->assertTrue(array_map('intval', ['1', '2']) === [1, 2]);
        $this->assertTrue(array_map('max', [5, 1], [3, 2]) === [5, 2]);
        $this->assertTrue(array_map('max', [5, 1, 3], [3, 2]) === [5, 2, 3]);
        $this->assertTrue(array_map('max', [5, 1], [3, 2], [7, 1, 3]) === [7, 2, 3]);

        $this->assertTrue(array_map(NULL, ['key' => 'value']) === ['key' => 'value']);

        $increment = function ($value) {
            return ++$value;
        };
        $this->assertTrue(array_map($increment, [1, 2]) === [2, 3]);
        $this->assertTrue(array_map($increment, [1 => 1, 2 => 2]) === [1 => 2, 2 => 3]);
        $this->assertTrue(array_map($increment, ['a' => 1, 'b' => 2]) === ['a' => 2, 'b' => 3]);
    }

    /**
     * @dataProvider columnDataProvider
     * @param array $source
     * @param $column
     * @param array $expected
     */
    public function testColumn(array $source, $column, array $expected)
    {
        $this->assertTrue(array_column($source, $column) === $expected);
    }

    public function columnDataProvider()
    {
        yield [
            [],
            'value',
            []
        ];

        yield [
            [
                [
                    'value' => 1
                ]
            ],
            'value',
            [1]
        ];

        // drop keys
        yield [
            [
                3 => [
                    'value' => 9
                ],
                5 => [
                    'value' => 25
                ],
            ],
            'value',
            [9, 25]
        ];

        // absent column
        $absentColumnArray = [
            [
                'code' => 1,
            ],
            [

            ],
            [
                'code' => 5
            ]
        ];
        yield [
            $absentColumnArray,
            'code',
            [1, 5]
        ];
        yield [
            $absentColumnArray,
            'value',
            []
        ];

        yield [
            [
                [
                    16 => 'a'
                ],
                [

                ],
                [
                    16 => 'b'
                ]
            ],
            16,
            ['a', 'b']
        ];
    }

    /**
     * @dataProvider columnKeyValueDataProvider
     * @param array $source
     * @param $column
     * @param $key
     * @param array $expected
     */
    public function testColumnKeyValue(array $source, $column, $key, array $expected)
    {
        $this->assertTrue(array_column($source, $column, $key) === $expected);
    }

    public function columnKeyValueDataProvider()
    {
        yield [
            [],
            'value',
            'key',
            [],
        ];

        yield [
            [
                [
                    'key' => 'k1',
                    'value' => 'v1',
                ],
                [
                    'key' => 'k2',
                    'value' => 'v2',
                ],
            ],
            'value',
            'key',
            [
                'k1' => 'v1',
                'k2' => 'v2',
            ],
        ];

        // absent
        yield [
            [
                [
                    'key' => 'k1',
                ],
                [
                    'value' => 'v2',
                ],
                [
                    'value' => 'v3'
                ],
                [
                    'key' => 'k5',
                    'value' => 'v5',
                ]
            ],
            'value',
            'key',
            [
                'v2',
                'v3',
                'k5' => 'v5'
            ],
        ];
    }

    /**
     * @dataProvider columnRebuildDataProvider
     * @param array $source
     * @param $key
     * @param array $expected
     */
    public function testColumnRebuild(array $source, $key, array $expected)
    {
        $this->assertTrue(array_column($source, null, $key) === $expected);
    }

    public function columnRebuildDataProvider()
    {
        yield [
            [
                [
                    'id' => 1
                ]
            ],
            'id',
            [
                1 => [
                    'id' => 1
                ]
            ]
        ];

        // absent
        yield [
            [
                [
                    'id' => 1,
                    'name' => 'Alex'
                ],
                [
                    'name' => 'Gringo'
                ]
            ],
            'id',
            [
                1 => [
                    'id' => 1,
                    'name' => 'Alex'
                ],
                [
                    'name' => 'Gringo'
                ]
            ]
        ];
    }

    public function testChangeKeyCase()
    {
        $this->assertTrue(array_change_key_case(['a' => 1]) === ['a' => 1]);
        $this->assertTrue(array_change_key_case(['a' => 1], CASE_LOWER) === ['a' => 1]);
        $this->assertTrue(array_change_key_case(['A' => 1]) === ['a' => 1]);
        $this->assertTrue(array_change_key_case(['A' => 1], CASE_LOWER) === ['a' => 1]);
        $this->assertTrue(array_change_key_case(['a' => 1], CASE_UPPER) === ['A' => 1]);
    }

    /**
     * @dataProvider padDataProvider
     * @param array $input
     * @param $size
     * @param $value
     * @param array $expect
     */
    public function testPad(array $input, $size, $value, array $expect)
    {
        $this->assertSame(array_pad($input, $size, $value), $expect);
    }

    public function padDataProvider()
    {
        yield [
            [],
            1,
            'value',
            ['value']
        ];

        yield [
            ['some'],
            2,
            'value',
            ['some', 'value']
        ];

        yield [
            ['some'],
            3,
            'value',
            ['some', 'value', 'value',]
        ];

        yield [
            ['key' => 'some'],
            3,
            'value',
            ['key' => 'some', 'value', 'value',]
        ];

        yield [
            ['key' => 'some'],
            -2,
            'value',
            ['value', 'key' => 'some']
        ];

        yield [
            ['a', 'b', 'c'],
            -5,
            'new',
            ['new', 'new', 'a', 'b', 'c']
        ];

        // try size that exist or less
        for ($size = -5; $size <= 5; ++$size) {
            yield [
                ['a', 'b', 'c', 'd', 'e'],
                1,
                $size,
                ['a', 'b', 'c', 'd', 'e']
            ];
        }
    }

    /**
     * @dataProvider spliceDataProvider
     * @param array $input
     * @param $offset
     * @param $args
     * @param array $expect
     */
    public function testSplice(array $input, $offset, array $args, array $expect)
    {
        array_splice($input, $offset, ...$args);

        $this->assertSame($input, $expect);
    }

    public function spliceDataProvider()
    {
        yield [
            ['a', 'b', 'c'],
            1,
            [1],
            ['a', 'c']
        ];

        yield [
            ['a', 'b', 'c'],
            1,
            [2],
            ['a']
        ];

        yield [
            ['a', 'b', 'c'],
            -1,
            [],
            ['a', 'b']
        ];

        yield [
            ['a', 'b', 'c'],
            1,
            [],
            ['a']
        ];
    }

    /**
     * @dataProvider replaceDataProvider
     * @param array $source
     * @param array $expect
     */
    public function testReplace(array $source, array $expect)
    {
        $this->assertSame(array_replace(...$source), $expect);
    }

    /**
     * @dataProvider replaceRecursiveDataProvider
     * @param array $source
     * @param array $expect
     */
    public function testReplaceRecursive(array $source, array $expect)
    {
        $this->assertSame(array_replace_recursive(...$source), $expect);
    }

    public function replaceRecursiveDataProvider()
    {
        yield from $this->commonReplaceDataProvider();

        yield [
            [
                [
                    'a' => [
                        'b' => 1,
                        'c' => 5,
                    ],
                    'r' => 7
                ],
                [
                    'a' => [
                        'e' => 2
                    ]
                ]
            ],
            [
                'a' => [
                    'b' => 1,
                    'c' => 5,
                    'e' => 2
                ],
                'r' => 7
            ],
        ];
    }

    public function replaceDataProvider()
    {
        yield from $this->commonReplaceDataProvider();

        yield [
            [
                [
                    'a' => [
                        'b' => 1,
                        'c' => 5,
                    ],
                    'r' => 7
                ],
                [
                    'a' => [
                        'e' => 2
                    ]
                ]
            ],
            [
                'a' => [
                    'e' => 2
                ],
                'r' => 7
            ],
        ];
    }

    public function commonReplaceDataProvider()
    {
        yield [
            [
                [], []
            ],
            []
        ];

        yield [
            [
                ['a', 'b', 'c'], []
            ],
            ['a', 'b', 'c']
        ];

        yield [
            [
                ['a', 'b', 'c'], [1, 2, 3, 4, 5]
            ],
            [1, 2, 3, 4, 5]
        ];

        yield [
            [
                ['a', 'b', 'c'], [1 => 'x']
            ],
            ['a', 'x', 'c']
        ];

        yield [
            [
                ['a', 'b', 'c', 'd', 'e'], [1 => 'x', 2 => 'y'], [2 => 'z', 3 => 'i']
            ],
            ['a', 'x',  'z', 'i', 'e']
        ];

        $source = [
            [
                'a' => 1,
                'b' => 2,
            ],
            [
                'b' => 5,
                'c' => 7,
            ],
            [
                'x' => 8,
                'y' => 9,
            ],
        ];

        $expect = array_merge(...$source);
        yield [
            $source,
            $expect
        ];

        yield [
            [
                [
                    'value',
                    'a' => 1,
                    'b' => 2,
                ],
                [
                    'rewrite'
                ]
            ],
            [
                'rewrite',
                'a' => 1,
                'b' => 2,
            ]
        ];
    }

    public function testCount()
    {
        $this->assertSame(count(null), 0);
        $this->assertSame(count([]), 0);
        $this->assertSame(count(['value']), 1);
        $this->assertSame(count([[1, 2]]), 1);
        $this->assertSame(count([[1, 2]], COUNT_NORMAL), 1);
        $this->assertSame(count([[1, 2]], COUNT_RECURSIVE), 3);
    }

    /**
     * @dataProvider reverseDefaultDataProvider
     * @param array $array
     * @param array $expected
     */
    public function testReverseDefault(array $array, array $expected)
    {
        $this->assertSame($expected, array_reverse($array));
    }

    public function reverseDefaultDataProvider()
    {
        yield [
            [1, 2, 3],
            [3, 2, 1]
        ];

        yield [
            ['a' => 1, 2, 3],
            [3, 2, 'a' => 1]
        ];
    }

    /**
     * @dataProvider reverseDataProvider
     * @param array $array
     * @param array $expected
     */
    public function testReverse(array $array, array $expected)
    {
        $this->assertSame($expected, array_reverse($array, true));
    }

    public function reverseDataProvider()
    {
        yield [
            [1, 2, 3],
            [2 => 3, 1 => 2, 0 => 1]
        ];

        yield [
            ['a' => 1, 2, 3],
            [1 => 3, 0 => 2, 'a' => 1]
        ];
    }

    /**
     * @dataProvider currentDataProvider
     * @param $expect
     * @param array $array
     */
    public function testCurrent($expect, array $array)
    {
        $this->assertSame($expect, current($array));
    }

    /**
     * @dataProvider currentDataProvider
     * @param $expect
     * @param array $array
     */
    public function testReset($expect, array $array)
    {
        $this->assertSame($expect, reset($array));
    }

    public function currentDataProvider()
    {
        $object = new \stdClass();

        return [
            [false, []],
            [false, [false]],
            [1, [1]],
            [true, [true]],
            [$object, [$object]],
        ];
    }

    public function testKey()
    {
        $array = [];
        $this->assertSame(null, key($array));

        $array = [1];
        $this->assertSame(0, key($array));

        $array = ['a' => 1];
        $this->assertSame('a', key($array));
    }

    public function textNext()
    {
        $array = [];
        $this->assertSame(false, next($array));

        $array = [1];
        $this->assertSame(false, next($array));
    }

    public function testNextKeyCurrentReset()
    {
        $array = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
            'd' => 4,
            'e' => 5,
        ];

        $this->assertSame(2, next($array));
        $this->assertSame(2, current($array));
        $this->assertSame('b', key($array));
        $this->assertSame(3, next($array));
        $this->assertSame(3, current($array));
        $this->assertSame('c', key($array));
        $this->assertSame(4, next($array));
        $this->assertSame(4, current($array));
        $this->assertSame('d', key($array));
        $this->assertSame(5, next($array));
        $this->assertSame(5, current($array));
        $this->assertSame('e', key($array));
        $this->assertSame(false, next($array));
        $this->assertSame(false, current($array));
        $this->assertSame(null, key($array));

        $this->assertSame(1, reset($array));
        $this->assertSame(1, current($array));
        $this->assertSame('a', key($array));
    }

    public function testStateAfterReturn()
    {
        $callback = function () {
            $array = [1, 2, 3];

            next($array);

            return $array;
        };

        $array = $callback();

        $this->assertSame(2, current($array));
    }
}
