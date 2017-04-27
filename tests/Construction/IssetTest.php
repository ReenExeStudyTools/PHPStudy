<?php

class IssetTest extends \PHPUnit_Framework_TestCase
{
    public function testSimple()
    {
        $this->assertSame(isset($variable), false);
        $variable = null;
        $this->assertSame(isset($variable), false);
        foreach (['', '1', 0, false, -1, 'some string', [], [''], [[]]] as $variable) {
            $this->assertSame(isset($variable), true);
        }
    }

    public function testDynamic()
    {
        $this->assertSame(isset(${'variable'}), false);
        ${'variable'} = 'some';
        $this->assertSame(isset(${'variable'}), true);
    }
}
