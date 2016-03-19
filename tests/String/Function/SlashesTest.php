<?php

class SlashesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider addSplashesDataProvider
     * @param $string
     * @param $expect
     */
    public function testAddSplashes($string, $expect)
    {
        $this->assertSame(addslashes($string), $expect);
    }

    public function addSplashesDataProvider()
    {
        yield [
            '',
            ''
        ];
    }
}
