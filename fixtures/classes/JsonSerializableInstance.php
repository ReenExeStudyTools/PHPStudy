<?php

namespace ReenExe\Study;

class JsonSerializableInstance implements \JsonSerializable
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function jsonSerialize()
    {
        return $this->data;
    }
}