<?php

namespace ReenExe\Study\OOP\ReturnType;

class SelfReturnType
{
    public static function getInstance(): self
    {
        return new self();
    }

    public static function getStaticInstance(): self
    {
        return new static();
    }

    public function getThis(): self
    {
        return $this;
    }
}
