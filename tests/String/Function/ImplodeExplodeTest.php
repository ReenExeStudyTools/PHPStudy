<?php

class ImplodeExplodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider joinProvider
     * @param string $glue
     * @param array $array
     * @param string $expect
     */
    public function testImplode(string $glue, array $array, string $expect)
    {
        $this->assertSame(implode($glue, $array), $expect);
    }

    /**
     * @dataProvider joinProvider
     * @param ...$array
     */
    public function testJoin(...$array)
    {
        $this->testImplode(...$array);
    }

    public function joinProvider()
    {
        foreach (['', ',', ':'] as $glue) {
            yield [
                $glue, [], ''
            ];

            yield [
                $glue, [''], ''
            ];

            yield [
                $glue, ['', ''], $glue
            ];
        }

        yield [
            ',', ['a', 'b', 'c'], 'a,b,c'
        ];

        yield [
            '', ['a', 'b', 'c'], 'abc'
        ];
    }

    /**
     * @dataProvider explodeProvider
     * @param $delimiter
     * @param $string
     * @param array $expected
     */
    public function testExplode($delimiter, $string, array $expected)
    {
        $this->assertSame(explode($delimiter, $string), $expected);
    }

    public function explodeProvider()
    {
        foreach ([',', ':'] as $glue) {
            yield [
                $glue, '', ['']
            ];

            yield [
                $glue, $glue, ['', '']
            ];
        }
    }

    /**
     * @dataProvider emptyExplodeProvider
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage explode(): Empty delimiter
     */
    public function testEmptyExplode($delimiter)
    {
        explode($delimiter, '');
    }

    public function emptyExplodeProvider()
    {
        yield [''];
        yield [false];
        yield [null];
    }
}