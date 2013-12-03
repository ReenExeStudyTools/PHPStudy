<?php

class SplitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $string
     * @param $length
     * @param $expected
     */
    public function test(string $string, $length, $expected)
    {
        $this->assertSame(str_split($string, $length), $expected);
    }

    public function testDefaultLength()
    {
        $this->assertSame(str_split('abc'), ['a', 'b', 'c']);
    }

    /**
     * @dataProvider failLengthDataProvider
     * @expectedException \PHPUnit_Framework_Error
     * @expectedExceptionMessage str_split(): The length of each segment must be greater than zero
     * @param int $length
     */
    public function testFailLength(int $length)
    {
        str_split('abc', $length);
    }

    public function failLengthDataProvider()
    {
        for ($i = -3; $i < 0; ++$i) {
            yield [$i];
        }
    }

    public function dataProvider()
    {
        yield [
            'abc',
            1,
            ['a', 'b', 'c']
        ];

        yield [
            'abc',
            2,
            ['ab', 'c']
        ];

        yield [
            'abc',
            3,
            ['abc']
        ];

        yield [
            'abc',
            5,
            ['abc']
        ];
    }
}