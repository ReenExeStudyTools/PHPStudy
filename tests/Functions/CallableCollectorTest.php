<?php

class CallableCollectorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $collector = new \ReenExe\Study\CallableCollector(1, function($l, $r) {
            return $l + $r;
        });
    }
}