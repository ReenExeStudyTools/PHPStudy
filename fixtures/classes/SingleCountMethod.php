<?php

namespace ReenExe\Study;

class SingleCountMethod
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function count()
    {
        return count($this->data);
    }
}