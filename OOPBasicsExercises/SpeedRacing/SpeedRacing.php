<?php

include 'Car.php';

$carCount = intval(rtrim(fgets(STDIN)));

$cars = [];

for ($i = 0; $i < $carCount; $i++) {
    $carInput = explode(' ', rtrim(fgets(STDIN)));
    $model = $carInput[0];
    $fuelAmount = floatval($carInput[1]);
    $fuelPerKm = floatval($carInput[2]);

    $currentCar = new Car($model, $fuelAmount, $fuelPerKm);

    $cars[$model] = $currentCar;
}

$input = rtrim(fgets(STDIN));

while ($input != "End") {
    $tokens = explode(' ', $input);

    if ($tokens[0] === 'Drive') {
        $car = (isset($cars[$tokens[1]])) ? $cars[$tokens[1]] : false;
        $distance = floatval($tokens[2]);

        if ($car !== false) {
            $car->drive($distance);
            $cars[$car->model] = $car;
        }
    }

    $input = rtrim(fgets(STDIN));
}

foreach ($cars as $car) {
    echo $car->model . ' ' . number_format(round($car->fuelAmount, 2), 2) . ' ' . $car->distanceTraveled . "\n";
}

