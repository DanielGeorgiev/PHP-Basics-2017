<?php

class Vehicle
{
    private $numberDoors;
    private $color;

    function __construct($numberDoors, $color)
    {
        $this->setNumberDoors($numberDoors);
        $this->setColor($color);
    }

    public function getNumberDoors()
    {
        return $this->numberDoors;
    }

    public function setNumberDoors($numberDoors)
    {
        $this->numberDoors = $numberDoors;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function __get($name)
    {
        return $this->{$name};
    }

    function paint($color){
        $this->setColor($color);
    }
}

$myVehicle = new Vehicle(2, 'orange');
$myVehicle->setNumberDoors(4);
echo $myVehicle->__get('numberDoors');
$myVehicle->paint('blue');