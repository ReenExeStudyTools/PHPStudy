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
    }
}
