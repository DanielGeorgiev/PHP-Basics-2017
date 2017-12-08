<?php

class Tire
{
    public $pressure;
    public $age;

    public function __construct(float $pressure, int $age)
    {
        $this->pressure = $pressure;
        $this->age = $age;
    }

    function isRightPressure()
    {
        return $this->pressure < 1;
    }
}