<?php

use ReenExe\Study\OOP\ReturnType\OverrideResultFactory;
use ReenExe\Study\OOP\ReturnType\ResponsibleEntity;

class OverriderReturnResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * return instance of subclass of returntype
     */
    public function test()
    {
        $instance = OverrideResultFactory::createResponsibleEntity();
        $this->assertInstanceOf(ResponsibleEntity::class, $instance);
    }
}
