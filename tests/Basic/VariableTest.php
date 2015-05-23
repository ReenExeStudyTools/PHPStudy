<?php

class VariableTest extends \PHPUnit_Framework_TestCase
{
    public function testValidName()
    {
        /**
         * Variable can start only from letters or _, and contains digit
         */

        $a = 1;
        $this->assertEquals($a, 1);

        $_a = 2;
        $this->assertEquals($_a, 2);

        $_1 = 'value';
        $this->assertEquals($_1, 'value');

        ${'c'} = 3;
        $this->assertEquals(${'c'}, 3);
        $this->assertEquals($c, 3);

        $aliasC = 'c';
        $this->assertEquals($$aliasC, 3);

        ${'123'} = 5;
        $this->assertEquals(${'123'}, 5);

        $variable123 = 123;
        $this->assertEquals(${'123'}, $$variable123);

        ${' with space '} = 6;
        $this->assertEquals(${' with space '}, 6);

        ${1} = 7;
        $this->assertEquals(${1}, 7);
        $this->assertEquals(${'1'}, 7);

        ${1e3} = 8;
        $this->assertEquals(${1e3}, 8);

        ${1e-3} = 9;
        $this->assertEquals(${1e-3}, 9);
        $this->assertEquals(${0.001}, 9);

        ${011} = 11;
        $this->assertEquals(${011}, 11);
        $this->assertEquals(${9}, 11);

        ${0xAA} = 0xC;
        $this->assertEquals(${0xAA}, 0xC);
        $this->assertEquals(${170}, 0xC);
    }

    public function testInvalidName()
    {
        // Parse error: syntax error, unexpected
        // $123 = 1;
        // $a_{'b'}_c = 1;
    }
}