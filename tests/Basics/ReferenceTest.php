<?php

class ReferenceTest extends \PHPUnit_Framework_TestCase
{
    public function testLink()
    {
        $a = 1;
        $b = &$a;

        $b = 2;
        $this->assertSame($a, 2);

        $c = &$b;

        $c = 3;
        $this->assertSame($a, 3);

        /**
         * Цікаво ж, що буде?
         */
        list($a, $b, $c) = [5, 6, 7];

        /**
         * Припущення - що всі значення будуть однакові і рівні останньому, а саме 7
         */
        $this->assertSame($a, 5);
        $this->assertSame($b, 5);
        $this->assertSame($c, 5);
        /**
         * Але результати дивують
         */

        /**
         * Друг підказав
         */
        list($a, $b, $c) = [8, 9, &$a];
        $this->assertSame($a, 8);
        $this->assertSame($b, 8);
        $this->assertSame($c, 8);
        /**
         * Співпало
         */

        list($a, $b, $c) = [&$a, 9, &$a];
        $this->assertSame($a, 9);
        $this->assertSame($b, 9);
        $this->assertSame($c, 9);
        /**
         * Дивно, згоден
         */
    }
}