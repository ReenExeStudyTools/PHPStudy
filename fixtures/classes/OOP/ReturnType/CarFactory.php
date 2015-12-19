<?php

namespace ReenExe\Study\OOP\ReturnType;

class CarFactory implements TrackFactory
{
    public static function createTrack():Car
    {
        return new Track();
    }
}