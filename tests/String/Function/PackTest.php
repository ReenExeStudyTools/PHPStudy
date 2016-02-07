<?php

class PackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $format
     * @param array $args
     * @param $expect
     */
    public function test($format, array $args, $expect)
    {
        $this->assertSame(pack($format, ...$args), $expect);
    }

    public function dataProvider()
    {
        yield [
            'A5',
            ['12345'],
            '12345'
        ];

        yield [
            'A6',
            ['12345'],
            '12345 '
        ];

        yield [
            'A3A2',
            ['123', '45'],
            '12345'
        ];

        yield [
            'A7A5',
            ['123', '45'],
            '123    45   '
        ];

        // wrong data
        yield [
            'A3',
            ['12345'],
            '123'
        ];

        yield [
            'A3A2',
            ['12345', '789'],
            '12378'
        ];
    }

    /**
     * @dataProvider wrongArgumentsCountDataProvider
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage pack(): Type A: not enough arguments
     * @param $format
     * @param array $args
     * @param $expect
     */
    public function testWrongArgumentsCount($format, array $args, $expect)
    {
        $this->assertSame(pack($format, ...$args), $expect);
    }

    public function wrongArgumentsCountDataProvider()
    {
        yield [
            'A3A2',
            ['12345'],
            '123'
        ];
    }

    /**
     * @dataProvider unDataProvider
     * @param $format
     * @param $data
     * @param array $expect
     */
    public function testUn($format, $data, array $expect)
    {
        $this->assertSame(unpack($format, $data), $expect);
    }

    public function unDataProvider()
    {
        yield [
            'A3',
            'ABC',
            [
                1 => 'ABC'
            ]
        ];
    }

    public function testPackNumber()
    {
        $format = 'S4';

        $args = [
            32,
            256,
            1024,
            15625,
        ];

        $packed = pack($format, ...$args);

        $unpacked = [
            1 => 32,
            2 => 256,
            3 => 1024,
            4 => 15625,
        ];

        $this->assertSame(unpack($format, $packed), $unpacked);
    }
}
