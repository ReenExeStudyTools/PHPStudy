<?php

class ModuleDivisionTest extends \PHPUnit_Framework_TestCase
{

    public function test()
    {
        $this->assertTrue(5 % 3 === 2);
        $this->assertTrue(5 % -3 === 2);

        $this->assertTrue(-5 % -3 === -2);
        $this->assertTrue(-5 % -3 === -2);
    }

}