<?php

class Vehicle
{
    protected $numberDoors;
    protected $color;
    protected $brand;
    protected $model;
    protected $year;


    protected function __construct($numberDoors, $color, $brand, $model, $year)
    {
        $this->setNumberDoors($numberDoors);
        $this->setColor($color);
        $this->setBrand($brand);
        $this->setModel($model);
        $this->setYear($year);
    }

    public function __get($name)
    {
        return $this->{$name};
    }

    //Getters, Setters
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

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }


    //Methods
    public function paint($color)
    {
        $this->setColor($color);
    }
}