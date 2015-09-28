<?php

namespace ReenExe\Study\OOP\Magic;

class CloneInstance
{
    private $whoIAm = 'original';

    public function getWhoIAm()
    {
        return $this->whoIAm;
    }

    public function __clone()
    {
        $this->whoIAm = 'clone';
    }
}