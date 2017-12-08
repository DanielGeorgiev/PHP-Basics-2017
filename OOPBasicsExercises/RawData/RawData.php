<?php

include 'Car.php';
include 'Cargo.php';
include 'Engine.php';
include 'Tire.php';

$carCount = intval(rtrim(fgets(STDIN)));

$cars = [];

for ($i = 0; $i < $carCount; $i++) {
    $input = explode(' ', rtrim(fgets(STDIN)));
    list($model, $engineSpeed, $enginePower, $cargoWeight, $cargoType,
        $tire1Pressure, $tire1Age,
        $tire2Pressure, $tire2Age,
        $tire3Pressure, $tire3Age,
        $tire4Pressure, $tire4Age) = $input;

    $engine = new Engine(intval($engineSpeed), intval($enginePower));
    $cargo = new Cargo(intval($cargoWeight), $cargoType);
    $tires = [new Tire(floatval($tire1Pressure), intval($tire1Age)), new Tire(floatval($tire2Pressure), intval($tire2Age)),
        new Tire(floatval($tire3Pressure), intval($tire3Age)), new Tire(floatval($tire4Pressure), intval($tire4Age))];
    $currentCar = new Car($model, $engine, $cargo, $tires);

    $cars[] = $currentCar;
}

$command = rtrim(fgets(STDIN));


if ($command === 'fragile') {
    foreach ($cars as $car) {
        if ($car->cargo->type === 'fragile'){
            foreach ($car->tires as $tire) {
                if ($tire->isRightPressure()){
                    echo $car->model . "\n";
                    break;
                }
            }
        }
    }
}
else if ($command === 'flamable'){
    foreach ($cars as $car) {
        if ($car->engine->power > 250){
            echo $car->model . "\n";
        }
    }
}
