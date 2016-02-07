<?php

class SubStrReplaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $replacement
     * @param $start
     * @param $length
     * @param $expect
     */
    public function test($string, $replacement, $start, $length, $expect)
    {
        $this->assertSame(
            substr_replace($string, $replacement, $start, ...$length),
            $expect
        );
    }

    public function dataProvider()
    {
        foreach ([[], [9], [10]] as $length) {
            yield [
                'There are many questions',
                'answers',
                15,
                $length,
                'There are many answers'
            ];
        }

        yield [
            'There are many questions',
            'answer',
            15,
            [8],
            'There are many answers'
        ];
    }
}
