<?php

namespace ReenExe\Study;

class IteratorAggregateClass implements \IteratorAggregate
{
    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function getIterator()
    {
        return new IteratorClass($this->array);
    }
}
