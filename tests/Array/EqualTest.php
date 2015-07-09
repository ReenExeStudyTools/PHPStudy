<?php

class EqualTest extends \PHPUnit_Framework_TestCase
{
    public function testEqual()
    {
        /**
         * == is equal key/value
         * === also equal order
         */

        $this->assertTrue([0 => 'A'] == ['A']);
        $this->assertTrue([0 => 'A'] === ['A']);

        $this->assertFalse(['A'] <> ['A']);
        $this->assertFalse(['A'] != ['A']);
        $this->assertFalse(['A'] !== ['A']);

        $this->assertTrue([0 => 'A', 1 => 'B'] == [1 => 'B', 0 => 'A']);
        $this->assertTrue([0 => 'A', 1 => 'B'] !== [1 => 'B', 0 => 'A']);
        $this->assertFalse([0 => 'A', 1 => 'B'] <> [1 => 'B', 0 => 'A']);
        $this->assertFalse([0 => 'A', 1 => 'B'] === [1 => 'B', 0 => 'A']);
        $this->assertFalse([0 => 'A', 1 => 'B'] === [1 => 'B', 0 => 'A']);
    }
}