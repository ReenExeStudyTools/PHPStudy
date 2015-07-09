<?php

class CallableCollectorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $collector = new \ReenExe\Study\CallableCollector(1, function($l, $r) {
            return $l + $r;
        });

        foreach ([2, 3, 4, 5, 6] as $value) {
            $collector($value);
        }

        $this->assertEquals($collector->getResult(), 21);
    }
}