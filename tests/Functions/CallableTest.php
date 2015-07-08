<?php

class CallableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider standardList
     */
    public function testStandard($name)
    {
        $this->assertDoubleCallable($name);

        /**
         * But for this - have Parse error
         *
         * (callable) $name;
         */
    }

    public function testVariable()
    {
        $callback = function() {};

        $this->assertCallable($callback);
    }

    public function testClosure()
    {
        $variable = 5;

        $callable = function() use ($variable){
            return $variable;
        };

        $this->assertEquals($callable(), $variable);
    }

    public function testClosureReference()
    {
        $variable = 5;
        $square = function() use (&$variable) {
            $variable *= $variable;
        };
        $square();
        $this->assertEquals($variable, 25);
    }

    public function testClosureRecursive()
    {
        $factorial = function($value) use(&$factorial) {
            static $cache = [];

            if (isset($cache[$value])) {
                return $cache[$value];
            }

            if ($value > 1) {
                return $cache[$value] = $value * $factorial($value - 1);
            }

            return 1;
        };

        $this->assertEquals($factorial(3), 1 * 2 * 3);
        $this->assertEquals($factorial(2), 1 * 2);
        $this->assertEquals($factorial(1), 1);
    }

    public function testCallUserFunction()
    {
        $this->assertEquals(call_user_func('boolval', 1), true);
        $this->assertEquals(call_user_func_array('boolval', [1]), true);

        $this->assertEquals(call_user_func('max', 1, 7), 7);
        $this->assertEquals(call_user_func_array('max', [1, 7]), 7);
    }

    public function testJustForFun()
    {
        /**
         * Segmentation fault (core dumped)

            $this->assertEquals(
                call_user_func('call_user_func', 'max', 1, 1),
                1
            );

            $this->assertEquals(
                call_user_func_array('call_user_func_array', ['max', 1, 1]),
                1
            );
         */
    }

    public function standardList()
    {
        return [
            ['array_map'],
            ['array_filter'],
            ['intval'],
            ['is_callable'],
            ['get_class'],
            ['call_user_func'],
            ['call_user_func_array'],
            ['\ReenExe\Study\CallableFunction::staticFunction'],
            ['\\ReenExe\\Study\\CallableFunction::staticFunction'],
        ];
    }

    public function testArrayFormat()
    {
        $object = new \ReenExe\Study\CallableFunction();

        $this->assertDoubleCallable([$object, 'method']);
        $this->assertDoubleCallable([$object, 'staticFunction']);
        $this->assertDoubleCallable(['\ReenExe\Study\CallableFunction', 'staticFunction']);
        $this->assertDoubleCallable([get_class($object), 'staticFunction']);
        $this->assertDoubleCallable([\ReenExe\Study\CallableFunction::class, 'staticFunction']);
    }

    public function testCallableParent()
    {
        $object = new \ReenExe\Study\CallableExtendFunction();

        $this->assertDoubleCallable([$object, 'parent::staticFunction']);
        $this->assertDoubleCallable(['\ReenExe\Study\CallableExtendFunction', 'parent::staticFunction']);

        /**
         * but have error when
         * $this->assertCallable([$object, 'parent::parent::method']);
         */

        $this->assertFalse(is_callable(['\ReenExe\Study\CallableDoubleExtendFunction', 'parent::parent::staticFunction']));
        $this->assertFalse(is_callable([new \ReenExe\Study\CallableDoubleExtendFunction(), 'parent::parent::method']));
    }

    public function testCallableClass()
    {
        $callable = new \ReenExe\Study\CallableClass();
        $this->assertCallable($callable);
    }

    private function assertDoubleCallable($function)
    {
        $this->assertTrue(is_callable($function));

        $this->assertCallable($function);
    }

    private function assertCallable(callable $function)
    {
        $this->assertTrue(true);
    }
}