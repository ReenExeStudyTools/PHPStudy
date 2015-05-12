<?php

class PatternTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider matchProvider
     */
    public function testMatch($pattern, array $map)
    {
        foreach ($map as list($subject, $result)) {
            $this->assertTrue(preg_match($pattern, $subject) === $result);
        }
    }

    public function matchProvider()
    {
        return [
            ['/[a-z]/', [
                ['abc', 1],
                ['xyz', 1],
                ['o', 1],
                ['L', 0],
                ['XL', 0],
                ['7', 0],
                ['1', 0],
                ['', 0],
            ]],
            ['/[a-z]/i', [
                ['x', 1],
                ['X', 1],
            ]],
        ];
    }
}