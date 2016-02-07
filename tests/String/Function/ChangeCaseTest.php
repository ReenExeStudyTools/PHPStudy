<?php

class ChangeCaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider  ucfirstDataProvider
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
            'why?',
            'Why?'
        ];

        yield [
            'Why?',
            'Why?'
        ];
    }
}
