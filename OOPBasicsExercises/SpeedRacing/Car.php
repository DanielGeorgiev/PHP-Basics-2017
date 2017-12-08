<?php

class Car
{
    public $model;
    public $fuelAmount;
    public $kmFuelCost;
    public $distanceTraveled;

    function __construct(string $model, float $fuelAmount, float $kmFuelCost, $distanceTraveled = 0)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->kmFuelCost = $kmFuelCost;
        $this->distanceTraveled = $distanceTraveled;
    }

    function drive(float $distance){
        $usedFuel = $distance * $this->kmFuelCost;
        if ($usedFuel <= $this->fuelAmount){
            $this->fuelAmount -= $usedFuel;
            $this->distanceTraveled += $distance;
        }
        else{
            echo "Insufficient fuel for the drive\n";
        }
    }
}
