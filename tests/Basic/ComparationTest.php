<?php

class ComparationTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertSame(1 <=> 8, -1);
        $this->assertSame('1' <=> '8', -1);
        $this->assertSame(3 <=> 1, 1);
        $this->assertSame('3' <=> '1', 1);
        $this->assertSame(5 <=> 5, 0);
        $this->assertSame('5' <=> '5', 0);

        $this->assertSame(3 <=> 21, -1);
        $this->assertSame('3' <=> '21', -1);

        $this->assertSame([] <=> [], 0);
        $this->assertSame(0 <=> [], -1);
        $this->assertSame(0 <=> '', 0);

        $this->assertSame('' <=> [], -1);
        $this->assertSame(null <=> '', 0);
        $this->assertSame(null <=> [], 0);

        $this->assertSame('' <=> null, null <=> []);
        $this->assertNotSame(null <=> [], [] <=> '');
    }
}