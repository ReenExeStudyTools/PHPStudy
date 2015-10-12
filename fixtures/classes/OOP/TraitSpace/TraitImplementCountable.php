<?php

namespace ReenExe\Study\OOP\TraitSpace;

trait TraitImplementCountable
{
    private $array = [];

    public function count()
    {
        return count($this->array);
    }

    public function add(...$array)
    {
        array_push($this->array, ...$array);
    }
}
