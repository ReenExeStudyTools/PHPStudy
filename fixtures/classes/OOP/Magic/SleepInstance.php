<?php

namespace ReenExe\Study\OOP\Magic;

class SleepInstance
{
    private $data;

    private $sleep = false;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __sleep()
    {
        $this->sleep = true;

        return ['data'];
    }

    public function __wakeup()
    {
        $this->sleep = false;
    }

    public function isSleep()
    {
        return $this->sleep;
    }

    public function getData()
    {
        return $this->data;
    }
}