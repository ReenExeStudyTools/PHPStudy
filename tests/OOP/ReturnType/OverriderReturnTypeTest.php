<?php

use ReenExe\Study\OOP\ReturnType\ResponsibleEntityFactory;
use ReenExe\Study\OOP\ReturnType\CarFactory;

class OverriderReturnTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Try override method with returntype subclass
     */
    public function testSubClassOverrideParentClassMethod()
    {
        /**
         * ERROR:
         * Fatal error:  Declaration of ReenExe\Study\OOP\ReturnType\ResponsibleEntityFactory::create(): ReenExe\Study\OOP\ReturnType\ResponsibleEntity must be compatible with ReenExe\Study\OOP\ReturnType\EntityFactory::create(): ReenExe\Study\OOP\ReturnType\Entity
            ResponsibleEntityFactory::create();
         */
    }

    /**
     * Try override method with returntype parentclass
     */
    public function testParentClassOverrideSubClassMethod()
    {
        /**
         * ERROR:
         * Fatal error:  Declaration of ReenExe\Study\OOP\ReturnType\CarFactory::createTrack(): ReenExe\Study\OOP\ReturnType\Car must be compatible with ReenExe\Study\OOP\ReturnType\TrackFactory::createTrack(): ReenExe\Study\OOP\ReturnType\Track
            CarFactory::createTrack();
         */
    }
}
