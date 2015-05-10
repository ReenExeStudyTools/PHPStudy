<?php

class SearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider strposProvider
     */
    public function testStrpos($haystack, $needle, $offset, $pos)
    {
        $this->assertSame(strpos($haystack, $needle, $offset), $pos);
    }

    public function strposProvider()
    {
        return [
            ['California', 'for', null, 4],
            ['California', 'while', null, false],
            ['California', 'for', 5, false],
        ];
    }
}