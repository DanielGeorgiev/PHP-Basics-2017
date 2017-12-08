<?php

class Car
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $travelDistance;

    function __construct($speed, $fuel, $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
        $this->travelDistance = 0;
    }


    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getFuel()
    {
        return $this->fuel;
    }

    public function setFuel($fuel)
    {
        $this->fuel = $fuel;
    }

    public function getFuelEconomy()
    {
        return $this->fuelEconomy;
    }

    public function setFuelEconomy($fuelEconomy)
    {
        $this->fuelEconomy = $fuelEconomy;
    }

    public function getTravelDistance()
    {
        return $this->travelDistance;
    }


    function travel($distance)
    {
        $fuelForKm = $this->fuelEconomy / $this->speed;

        for ($i = 1; $i <= $distance; $i++) {
            if ($this->fuel >= $fuelForKm) {
                $this->travelDistance += 1;
                $this->fuel -= $fuelForKm;
            }
        }
    }

    function refuel($liters)
    {
        $this->fuel += $liters;
    }

    function getTime()
    {
        $time = number_format($this->travelDistance / $this->speed, 2);

        if (intval($time) < 1) {
            return ['hours' => 0, 'minutes' => intval($time * 60)];
        }

        $time = explode('.', $time);

        return array('hours' => intval($time[0]), 'minutes' => intval($time[1]));
    }
}

$carInfo = explode(' ', rtrim(fgets(STDIN)));
$car = new Car($carInfo[0], $carInfo[1], $carInfo[2]);

$input = rtrim(fgets(STDIN));

while ($input !== 'END') {
    $tokens = explode(' ', $input);
    $cmd = $tokens[0];

    switch ($cmd) {
        case 'Travel':
            $distance = $tokens[1];
            $car->travel($distance);
            break;
        case 'Distance':
            echo 'Total Distance: ' . number_format($car->getTravelDistance(), 1) . PHP_EOL;
            break;
        case 'Time':
            $time = $car->getTime();
            echo "Total Time: " . $time['hours'] . " hours and " . $time['minutes'] . " minutes\n";
            break;
        case 'Fuel':
            echo "Fuel left: " . number_format($car->getFuel(), 1) . " liters\n";
            break;
        case 'Refuel':
            $liters = $tokens[1];
            $car->refuel($liters);
            break;
    }

    $input = rtrim(fgets(STDIN));
}