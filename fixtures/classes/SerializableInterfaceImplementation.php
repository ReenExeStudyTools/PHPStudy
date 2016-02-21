<?php

namespace ReenExe\Study;

class SerializableInterfaceImplementation implements \Serializable
{
    private $data;

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function serialize()
    {
        return serialize($this->data);
    }

    public function unserialize($serialized)
    {
        $this->data = unserialize($serialized);
    }

    public function getData()
    {
        return $this->data;
    }
}
