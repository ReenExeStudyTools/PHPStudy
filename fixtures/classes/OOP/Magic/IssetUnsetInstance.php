<?php

namespace ReenExe\Study\OOP\Magic;

class IssetUnsetInstance
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __unset($name)
    {
        unset($this->data[$name]);
    }
}