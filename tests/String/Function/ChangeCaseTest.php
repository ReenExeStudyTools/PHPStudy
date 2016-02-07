<?php

class ChangeCaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider ucfirstDataProvider
     * @param $string
     * @param $expect
     */
    public function testUcfirst($string, $expect)
    {
        $this->assertSame(ucfirst($string), $expect);
    }

    public function ucfirstDataProvider()
    {
        yield [
            'this',
            'This'
        ];

        yield [
            'This',
            'This'
        ];

        yield [
            'this is that',
            'This is that'
        ];
    }

    /**
     * @dataProvider ucwordsDataProvider
     * @param $string
     * @param $expect
     */
    public function testUcwords($string, $expect)
    {
        $this->assertSame(ucwords($string), $expect);
    }

    public function ucwordsDataProvider()
    {
        yield [
            'this',
            'This'
        ];

        yield [
            'This',
            'This'
        ];

        yield [
            'this is that',
            'This Is That'
        ];
    }
}
