<?php

class JSONTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider defaultDataProvider
     * @param $value
     * @param $expect
     */
    public function testDefault($value, $expect)
    {
        $this->assertSame($expect, json_encode($value));
    }

    /**
     * @dataProvider dataProvider
     * @param $value
     * @param $options
     * @param $expect
     */
    public function testOption($value, $options, $expect)
    {
        $this->assertSame($expect, json_encode($value, $options));
    }

    public function defaultDataProvider()
    {
        yield [[], '[]'];

        yield [[1], '[1]'];

        yield [[0 => 1], '[1]'];

        $tryIntAssoc = [];
        for ($i = 0; $i < 3; ++$i) {
            $tryIntAssoc[$i] = $i;
        }

        yield [$tryIntAssoc, '[0,1,2]'];
    }

    public function dataProvider()
    {
        yield [
            [],
            0,
            '[]',
        ];

        yield [
            [],
            JSON_FORCE_OBJECT,
            '{}',
        ];
    }
}
