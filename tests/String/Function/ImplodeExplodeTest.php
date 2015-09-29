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
     * @param $delimeter
     * @param $string
     * @param array $expected
     */
    public function testExplode($delimeter, $string, array $expected)
    {
        $this->assertSame(explode($delimeter, $string), $expected);
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
}