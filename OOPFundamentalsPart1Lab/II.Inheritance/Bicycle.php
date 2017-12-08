<?php

include 'Vehicle.php';

class Bicycle extends Vehicle
{
    private $forSkirt;
    private $isMoving;


    function __construct($color, $brand, $model, $year, $forSkirt)
    {
        parent::__construct(0, $color, $brand, $model, $year);
        $this->forSkirt = $forSkirt;
        $this->isMoving = false;
    }

    function __toString()
    {
        return "<table>
                    <tr>
                        <th>Doors</th>
                        <th>Color</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>ForSkirt</th>
                        <th>isMoving</th>
                    </tr>
                    <tr>
                        <td>" . $this->getNumberDoors() . "</td>
                        <td>" . $this->getColor() . "</td>
                        <td>" . $this->getBrand() . "</td>
                        <td>" . $this->getModel() . "</td>
                       <td>" . $this->getYear() . "</td>
                        <td>" . (($this->getForSkirt()) ? "Yes" : "No") . "</td>
                        <td>" . (($this->isMoving()) ? "Yes" : "No") . "</td>
                    </tr>";
    }

   //Getters, Setters
    public function getForSkirt()
    {
        return $this->forSkirt;
    }

    public function setForSkirt($forSkirt)
    {
        $this->forSkirt = $forSkirt;
    }

    public function isMoving(): bool
    {
        return $this->isMoving;
    }

    public function setIsMoving(bool $isMoving)
    {
        $this->isMoving = $isMoving;
    }

    //Methods
    function ride()
    {
        $this->isMoving = true;
    }

    function stop()
    {
        $this->isMoving = false;
    }
}

$b1 = new Bicycle('red', 'Moz', 'S223', 2014, true);
echo $b1;
