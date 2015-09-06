<?php

use ReenExe\Study\OOP\Override\Simple;
use ReenExe\Study\OOP\Override\SubSimple;

class OverrideTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $simple = new Simple();
        $this->assertTrue($simple->get('value') === 'value');
        $simple = new SubSimple();
        $this->assertTrue($simple->get('value') === 'valuevalue');
    }
}