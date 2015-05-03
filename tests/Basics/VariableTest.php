<?php

class VariableTest extends \PHPUnit_Framework_TestCase
{
    public function testValidName()
    {
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

        ${' with space '} = 6;
        $this->assertEquals(${' with space '}, 6);
    }

    public function testInvalidName()
    {
        // Parse error: syntax error, unexpected
        // $123 = 1;
        // $a_{'b'}_c = 1;
    }
}