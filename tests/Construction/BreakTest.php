<?php

class BreakTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        while (true) {
            break;
            $this->fail();
        }

        /**
         * Fatal error: Cannot 'break' 2 levels
            while (true) {
                break;
            }
         */
    }

    public function testNested()
    {
        while (true) {
            while (true) {
                break 2;
            }
        }
    }
}