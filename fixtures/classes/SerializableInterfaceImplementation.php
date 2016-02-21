<?php

namespace ReenExe\Study;

class SerializableInterfaceImplementation implements \Serializable
{
    private $data;

    /**
     * SerializableInterfaceImplementation constructor.
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
        // TODO: Implement unserialize() method.
    }
}
