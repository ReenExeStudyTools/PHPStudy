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
        }

        yield [
            ',', ['a', 'b', 'c'], 'a,b,c'
        ];

        yield [
            '', ['a', 'b', 'c'], 'abc'
        ];
    }
}