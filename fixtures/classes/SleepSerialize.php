<?php

namespace ReenExe\Study;

class SleepSerialize implements \Serializable
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __sleep()
    {
        return ['data'];
    }

    public function serialize()
    {
        return serialize($this->data);
    }

    public function unserialize($serialized)
    {
        $this->data = unserialize($serialized);
    }
}
