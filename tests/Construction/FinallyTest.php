<?php

class FinallyTest extends \PHPUnit_Framework_TestCase
{
    public function testMain()
    {
        try {
            $this->assertTrue(true);
        } finally {
            return;
        }

        $this->fail();
    }

    /**
     * @expectedException \LogicException
     */
    public function testEmptyCatching()
    {
        try {
            throw new \LogicException();
        } finally {
            $this->assertTrue(true);
        }
    }

    /**
     * @expectedException \LogicException
     */
    public function testRewriteException()
    {
        try {
            throw new \Exception();
        } finally {
            throw new \LogicException();
        }
    }

    /**
     * @expectedException \LogicException
     */
    public function testFinallyPriority()
    {
        try {
            throw new \Exception();
        } catch(\Exception $e) {
            /**
             * also can: throw $e;
             */
            $this->fail();
        } finally {
            throw new \LogicException();
        }
    }
}