<?php

class JSONTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $value
     * @param $expect
     */
    public function test($value, $expect)
    {
        $this->assertSame(json_encode($value), $expect);
    }

    public function dataProvider()
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
}
