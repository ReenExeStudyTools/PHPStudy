<?php

class StrReplaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $search
     * @param $replace
     * @param $subject
     * @param $expected
     * @param $countExpected
     */
    public function test($search, $replace, $subject, $expected, $countExpected)
    {
        $this->assertEquals(str_replace($search, $replace, $subject, $count), $expected);

        $this->assertEquals($count, $countExpected);
    }

    public function dataProvider()
    {
        return [
            ['a', 'z', 'x', 'x', 0],
            ['a', 'z', 'a', 'z', 1],
            ['aa', 'z', 'a', 'a', 0],
            ['aa', 'z', 'aa', 'z', 1],
            ['a', 'z', 'aa', 'zz', 2],
            [['a'], ['z'], 'aa', 'zz', 2],
            // some magics
            [['a', 'p'], ['apple', 'pear'], 'a p', 'apearpearle pear', 4],
        ];
    }
}