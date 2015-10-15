<?php

use ReenExe\Study\EntityClass;

class GetNullPropertyTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $entity = new EntityClass();

        $entity->setId(7);

        $this->assertSame($entity->getId(), 7);

        /**
         * Parse error
            $this->assertSame($entity?->getId(), 7);
            $this->assertSame($entity-?>getId(), 7);
            $this->assertSame($entity->?getId(), 7);

            $this->assertSame($entity>?getId(), 7);
            $this->assertSame($entity?>getId(), 7);
         */
    }
}