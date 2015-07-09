<?php

namespace ReenExe\Study;

class CallableCollector
{
    /**
     * @var
     */
    private $startValue;

    /**
     * @var callable
     */
    private $process;

    /**
     * @param $startValue
     * @param callable $process
     */
    public function __construct($startValue, callable $process)
    {
        $this->startValue = $startValue;
        $this->process = $process;
    }

    /**
     * @param $value
     * @return $this
     */
    public function __invoke($value)
    {
        $process = $this->process;
        $this->startValue = $process($this->startValue, $value);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->startValue;
    }
}