<?php

use ReenExe\Study\StringClass;

class AnonymousClassTest extends \PHPUnit_Framework_TestCase
{
    public function testSimple()
    {
        $anonymousClass = new class {};
    }

    /**
     * @dataProvider constructorDataProvider
     */
    public function testConstructor($value)
    {
        $anonymousClass = new class($value) {
            private $value;

            public function __construct($value)
            {
                $this->value = $value;
            }

            public function getValue()
            {
                return $this->value;
            }
        };

        $this->assertSame($anonymousClass->getValue(), $value);
    }

    public function constructorDataProvider()
    {
        yield [1];
        yield ['text'];
        yield [true];
    }

    public function test()
    {
        $class = new StringClass('source');
        $this->assertSame((string) $class, 'source');

        $anonymousClass = new class('anonymous') extends StringClass{};
        $this->assertSame((string) $anonymousClass, 'anonymous');
    }
}