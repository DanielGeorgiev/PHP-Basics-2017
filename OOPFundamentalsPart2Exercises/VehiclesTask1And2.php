<?php

abstract class Vehicle
{
    protected $fuelQuantity;
    protected $fuelConsumpt;
    protected $fuelTank;

    public function getFuelQuantity()
    {
        return $this->fuelQuantity;
    }

    public function setFuelQuantity($fuelQuantity)
    {
        $this->fuelQuantity = $fuelQuantity;
    }

    public function getFuelConsumpt()
    {
        return $this->fuelConsumpt;
    }

    public function setFuelConsumpt($fuelConsumpt)
    {
        $this->fuelConsumpt = $fuelConsumpt;
    }

    public function getFuelTank()
    {
        return $this->fuelTank;
    }

    public function setFuelTank($fuelTank)
    {
        $this->fuelTank = $fuelTank;
    }

    abstract function drive($distance);

    abstract function refuel($fuel);
}

class Car extends Vehicle
{
    public function __construct($fuelQuantity, $fuelConsumpt, $fuelTank)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumpt($fuelConsumpt + 0.9);
        $this->setFuelTank($fuelTank);
    }

    public function drive($distance)
    {
        $usedFuel = $distance * $this->fuelConsumpt;

        if ($usedFuel <= $this->fuelQuantity) {
            echo "Car travelled $distance km\n";
            $this->fuelQuantity -= $usedFuel;
        } else {
            echo "Car needs refueling\n";
        }
    }

    public function refuel($fuel)
    {
        if ($fuel < 0){
            echo "Fuel must be a positive number\n";
        }
        else if ($fuel + $this->fuelQuantity <= $this->fuelTank) {
            $this->fuelQuantity += $fuel;
        } else {
            echo 'Cannot fit fuel in tank' . PHP_EOL;
        }
    }
}

class Truck extends Vehicle
{
    public function __construct($fuelQuantity, $fuelConsumpt, $fuelTank)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumpt($fuelConsumpt + 1.6);
        $this->setFuelTank($fuelTank);
    }

    public function drive($distance)
    {
        $usedFuel = $distance * $this->fuelConsumpt;

        if ($usedFuel <= $this->fuelQuantity) {
            echo "Truck travelled $distance km\n";
            $this->fuelQuantity -= $usedFuel;
        } else {
            echo "Truck needs refueling\n";
        }
    }

    public function refuel($fuel)
    {
        if ($fuel < 0){
            echo "Fuel must be a positive number\n";
        }
        $this->fuelQuantity += $fuel * 95 / 100;
    }
}

class Bus extends Vehicle
{
    public function __construct($fuelQuantity, $fuelConsumpt, $fuelTank)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumpt($fuelConsumpt);
        $this->setFuelTank($fuelTank);
    }

    public function drive($distance)
    {
        $usedFuel = $distance * $this->fuelConsumpt;

        if ($usedFuel <= $this->fuelQuantity) {
            echo "Bus travelled $distance km\n";
            $this->fuelQuantity -= $usedFuel;
        } else {
            echo "Bus needs refueling\n";
        }
    }

    public function refuel($fuel)
    {
        if ($fuel < 0){
            echo "Fuel must be a positive number\n";
        }
        else if ($fuel + $this->fuelQuantity <= $this->fuelTank) {
            $this->fuelQuantity += $fuel;
        } else {
            echo 'Cannot fit fuel in tank' . PHP_EOL;
        }
    }
}

$carInput = explode(' ', rtrim(fgets(STDIN)));
$truckInput = explode(' ', rtrim(fgets(STDIN)));
$busInput = explode(' ', rtrim(fgets(STDIN)));

$car = new Car(floatval($carInput[1]), floatval($carInput[2]), floatval($carInput[3]));
$truck = new Truck(floatval($truckInput[1]), floatval($truckInput[2]), floatval($carInput[3]));
$bus = new Bus(floatval($busInput[1]), floatval($busInput[2]), floatval($busInput[3]));


$count = intval(rtrim(fgets(STDIN)));

for ($i = 0; $i < $count; $i++) {
    $input = explode(' ', rtrim(fgets(STDIN)));

    switch ($input[0]) {
        case 'Drive':
            if ($input[1] === 'Car') {
                $car->drive(floatval($input[2]));
            } else if ($input[1] === 'Truck') {
                $truck->drive(floatval($input[2]));
            } else if ($input[1] === 'Bus'){
                $bus->setFuelConsumpt($bus->getFuelConsumpt() + 1.4);
                $bus->drive(floatval($input[2]));
            }
            break;
        case 'Refuel':
            if ($input[1] === 'Car') {
                $car->refuel(floatval($input[2]));
            } else if ($input[1] === 'Truck') {
                $truck->refuel(floatval($input[2]));
            } else if ($input[1] === 'Bus'){
                $bus->refuel(floatval($input[2]));
            }
            break;
        case 'DriveEmpty':
            if ($input[1] === 'Bus'){
                $bus->drive(floatval($input[2]));
            }
            break;
    }
}

echo 'Car: ' . number_format($car->getFuelQuantity(), 2) . PHP_EOL;
echo 'Truck: ' . number_format($truck->getFuelQuantity(), 2) . PHP_EOL;
echo 'Bus: ' . number_format($bus->getFuelQuantity(), 2) . PHP_EOL;
