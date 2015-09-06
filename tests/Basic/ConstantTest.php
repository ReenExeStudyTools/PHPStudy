<?php

class ConstantTest extends \PHPUnit_Framework_TestCase
{
    public function testStrictCase()
    {
        define('SOME_CASE_CONSTANT', 1);
        $this->assertTrue(constant('SOME_CASE_CONSTANT') === 1);
        $this->assertTrue(SOME_CASE_CONSTANT === 1);
    }

    /**
     * @depends testStrictCase
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testFailStrictCase()
    {
        constant('some_case_constant');
    }

    /**
     * @depends testStrictCase
     * @expectedException \PHPUnit_Framework_Error_Notice
     */
    public function testFailStrictDefaultVariantCase()
    {
        some_case_constant;
    }

    public function testMultiCase()
    {
        define('some_multi_CASE_CONSTANT', 3, true);
        $this->assertTrue(constant('SOME_MULTI_CASE_CONSTANT') === 3);
        $this->assertTrue(SOME_MULTI_CASE_CONSTANT === 3);
        $this->assertTrue(constant('some_multi_case_constant') === 3);
        $this->assertTrue(some_multi_case_constant === 3);
    }
}