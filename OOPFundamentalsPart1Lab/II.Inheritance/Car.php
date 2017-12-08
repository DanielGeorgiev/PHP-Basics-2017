<?php

include 'Vehicle.php';

class Car extends Vehicle
{
    public function __construct($numberDoors, $color, $brand, $model, $year)
    {
        parent::__construct($numberDoors, $color, $brand, $model, $year);
    }
}

$myCar = new Car(4, 'red', 'Audi', 'A4', 2016);
$myCar->paint('black');
print_r($myCar);