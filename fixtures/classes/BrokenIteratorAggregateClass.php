<?php

namespace ReenExe\Study;

class BrokenIteratorAggregateClass implements \IteratorAggregate
{
    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function getIterator()
    {
        return $this->array;
    }
}
