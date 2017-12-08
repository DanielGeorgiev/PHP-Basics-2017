<?php

class Car
{
    private $brand;
    private $model;
    private $year;

    function __construct(string $brand, int $year, string $engine, int $seats, int $horsepower)
    {
        $this->brand = $brand;
        $this->setYear($year);
        $this->model = new ModelDetails($engine, $seats, $horsepower);
    }

    public function setYear($year)
    {
        if (is_numeric($year)) {
            $this->year = $year;
        }
    }

    public function getYear()
    {
        return $this->year;
    }


    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }
}

class ModelDetails
{
    private $engine;
    private $seats;
    private $horsepower;

    public function __construct($engine, $seats, $horsepower)
    {
        $this->engine = $engine;
        $this->seats = $seats;
        $this->horsepower = $horsepower;
    }

    public function getEngine()
    {
        return $this->engine;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function getHorsepower()
    {
        return $this->horsepower;
    }
}


$car = new Car('Mercedes', 2014, 'AMG 5.5L V8 BITURBO', 5, 577);

print_r($car);