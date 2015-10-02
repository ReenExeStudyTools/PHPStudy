<?php

namespace ReenExe\Study\NameSpaceTest;

require_once __FIXTURES__ . '/namespace/functions.php';

use ReenExe\Study\NamespaceFunctions;

class FunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testFull()
    {
        $this->assertTrue(\ReenExe\Study\NamespaceFunctions\simple());
    }

    public function testPartial()
    {
        $this->assertTrue(NamespaceFunctions\simple());
    }
}