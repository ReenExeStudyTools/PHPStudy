<?php

use ReenExe\Study\OOP\ReturnType\OverrideResultFactory;
use ReenExe\Study\OOP\ReturnType\ResponsibleEntity;

class OverriderReturnResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * return instance of subclass of returntype
     */
    public function testReturnSubclass()
    {
        $instance = OverrideResultFactory::createResponsibleEntity();
        $this->assertInstanceOf(ResponsibleEntity::class, $instance);
    }

    /**
     * return instance of parentclass of returntype
     */
    public function testReturnParent()
    {
        /**
         * ERROR:
         * Fatal error:  Uncaught TypeError: Return value of ReenExe\Study\OOP\ReturnType\OverrideResultFactory::createEntity() must be an instance of ReenExe\Study\OOP\ReturnType\ResponsibleEntity, instance of ReenExe\Study\OOP\ReturnType\Entity returned
            $instance = OverrideResultFactory::createEntity();
         */
    }
}
