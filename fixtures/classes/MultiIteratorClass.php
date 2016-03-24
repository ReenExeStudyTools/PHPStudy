<?php

namespace ReenExe\Study;

class MultiIteratorClass extends IteratorClass implements \IteratorAggregate
{
    private $aggregate;

    public function __construct(array $simple, array $aggregate)
    {
        parent::__construct($simple);

        $this->aggregate = $aggregate;
    }

    public function getIterator()
    {
        return new IteratorClass($this->aggregate);
    }
}
