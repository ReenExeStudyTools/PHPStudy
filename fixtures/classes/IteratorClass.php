<?php

namespace ReenExe\Study;

class IteratorClass implements \Iterator
{
    /**
     * @var int
     */
    private $position = 0;

    /**
     * @var array
     */
    private $array;

    public function __construct(array $array)
    {
        $this->array = array_values($array);
    }

    public function current()
    {
        return $this->array[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->array[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
