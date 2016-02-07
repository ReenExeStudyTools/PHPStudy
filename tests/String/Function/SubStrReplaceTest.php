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
        foreach ([[]] as $length) {
            yield [
                'There are many questions',
                'answers',
                15,
                $length,
                'There are many answers'
            ];
        }
    }
}
