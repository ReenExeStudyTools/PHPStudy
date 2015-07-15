<?php

class AutoTypeTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $integer = PHP_INT_MAX;
        $this->assertTrue(gettype($integer) === 'integer');

        $double = $integer + 1;
        $this->assertTrue(gettype($double) === 'double');
    }
}