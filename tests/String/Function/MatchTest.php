<?php

class MatchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider sscanfProvider
     */
    public function testSscanf($str, $format, $expect)
    {
        $this->assertSame(sscanf($str, $format), $expect);
    }

    public function sscanfProvider()
    {
        return [
            ['3 7', '%d %d', [3, 7]]
        ];
    }
}