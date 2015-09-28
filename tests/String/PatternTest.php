<?php

class PatternTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider matchProvider
     */
    public function testMatch($pattern, array $map)
    {
        foreach ($map as list($subject, $result)) {
            $this->assertSame(preg_match($pattern, $subject), $result);
        }
    }

    public function matchProvider()
    {
        yield ['/[a-z]/', [
            ['abc', 1],
            ['xyz', 1],
            ['o', 1],
            ['L', 0],
            ['XL', 0],
            ['7', 0],
            ['1', 0],
            ['', 0],
        ]];

        yield ['/[a-z]/i', [
            ['x', 1],
            ['X', 1],
        ]];

        yield ['/./', [
            ['a', 1],
            ['b', 1],
            ['', 0],
        ]];

        foreach (['/a|b/', '/(a|b)/', '/((a|b))/', '/(a)|(b)/'] as $pattern) {
            yield [$pattern, [
                ['a', 1],
                ['aa', 1],
                ['b', 1],
                ['bb', 1],
                ['ab', 1],
                ['c', 0],
            ]];
        }

        yield [
            '/\d/', [
                [1, 1],
                ['exp > 2', 1],
            ]
        ];

        yield [
            '/\w/', [
                [1, 1],
                ['exp > 2', 1],
            ]
        ];

        yield [
            '/^a/', [
                ['a', 1],
                ['amber', 1],
                ['brute', 0],
            ]
        ];

        yield [
            '/a$/', [
                ['a', 1],
                ['gloria', 1],
                ['bone', 0],
            ]
        ];

        yield [
            '/^a$/', [
                ['a', 1],
                ['aaa', 0],
                ['c', 0],
            ]
        ];

        foreach (['/a*/', '/a?/'] as $pattern) {
            yield [
                $pattern, [
                    ['a', 1],
                    ['aaaaa', 1],
                    ['', 1],
                ]
            ];
        }

        yield [
            '/a+/', [
                ['a', 1],
                ['aaaaa', 1],
                ['', 0],
            ]
        ];

        yield [
            '/^\d{5}-\d{3}/',
            [
                ['12345-678', 1],
                ['123-678', 0],
                ['3-6', 0],
            ]
        ];
    }
}