<?php

use ReenExe\Study\OOP\ReturnType\ResponsibleEntityFactory;

class OverriderReturnTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Try override method with returntype subclass
     */
    public function test()
    {
        /**
         * ERROR:
         * Fatal error:  Declaration of ReenExe\Study\OOP\ReturnType\ResponsibleEntityFactory::create(): ReenExe\Study\OOP\ReturnType\ResponsibleEntity must be compatible with ReenExe\Study\OOP\ReturnType\EntityFactory::create(): ReenExe\Study\OOP\ReturnType\Entity
            ResponsibleEntityFactory::create();
         */
    }
}
