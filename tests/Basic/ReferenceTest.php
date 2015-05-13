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

    public function testList()
    {
        $a = 1;
        $b = 2;
        $c = 3;

        list($d, $e, $f) = [&$a, &$b, &$c];

        $d = 5;
        $e = 6;
        $f = 7;

        /**
         * Допускав, що будуть 5, 6, 7 - але...
         */
        $this->assertSame($a, 1);
        $this->assertSame($b, 2);
        $this->assertSame($c, 3);

        /**
         * Спробуємо інакше:
         */
        $i = 25;
        $j = [&$i];

        $this->assertSame($j, [25]);

        $i = 35;
        $this->assertSame($j, [35]);
        /**
         * Хоч, тут співпало
         */
    }

    public function testOperation()
    {
        $a = 1;
        $b = &$a + 1;

        $this->assertSame($a, 1);
        $this->assertSame($b, 1);

        $c = 3;
        $d = &$c * 2;
        $this->assertSame($c, 3);
        $this->assertSame($d, 3);
    }

    public function testIncrement()
    {
        /*
            Parse error: syntax error, unexpected '++'
                1.
                    $a = 1;
                    $b = &$a++;
                2.
                    $a = 1;
                    $b = ++&$a;
                3.
                    $a = 1;
                    $b = &++$a;
         */
    }
}