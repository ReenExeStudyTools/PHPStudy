<?php

use ReenExe\Study\TypeListClass;

class TypeTest extends \PHPUnit_Framework_TestCase
{
    public function testArray()
    {
        $fixture = new TypeListClass();

        /**
         * TODO: wait completed PHP 7
         * Fatal error:
         *  Uncaught TypeException:
         *  Argument 1 passed to ReenExe\Study\TypeListClass::setArray() must be of the type array, integer given

            $fixture->setArray(1);

         */

        /**
         * Fatal error:
         *  Uncaught TypeException:
         *  Argument 1 passed to ReenExe\Study\TypeListClass::setInt() must be of the type integer, string given

            $fixture->setInt('text');

         */
    }
}