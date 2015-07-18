<?php

class AliasTypeTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertTrue((int) '1' === 1);
        $this->assertTrue((integer) '1' === 1);

        $this->assertTrue((bool) '1' === true);
        $this->assertTrue((boolean) '1' === true);

        $this->assertTrue((float) '1' === 1.0);
        $this->assertTrue((double) '1' === 1.0);
        $this->assertTrue((real) '1' === 1.0);

        $this->assertTrue((unset) '1' === NULL);
    }
}