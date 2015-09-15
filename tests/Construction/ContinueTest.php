<?php

class ContinueTest extends \PHPUnit_Framework_TestCase
{
    public function testDo()
    {
        do {
            continue;

            $this->fail();
        } while (false);
    }

    public function testFor()
    {
        for ($i = 1; $i < 5; ++$i) {
            continue;

            $this->fail();
        }

        /**
         * Fatal error: Cannot 'continue' 2 levels
            for ($i = 1; $i < 5; ++$i) {
                continue 2;
            }
         */


        $this->assertTrue($i === 5);
    }

    public function testNested()
    {
        for ($i = 1; $i < 5; ++$i) {
            for ($j = 1; $j < 5; ++$j) {
                continue 2;
            }
        }

        $this->assertTrue($i === 5);
        $this->assertTrue($j === 1);
    }
}