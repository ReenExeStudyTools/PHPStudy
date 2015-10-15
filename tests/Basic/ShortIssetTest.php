<?php

class ShortIssetTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $array = [];

        $this->assertSame($array['value'] ?? 'other', 'other');

        $array['value'] = false;

        $this->assertSame($array['value'] ?? 'other', false);

        $array['value'] = null;

        $this->assertSame($array['value'] ?? 'some', 'some');
    }
}