<?php
function isInViolation(int $speed, string $road): string {
    $radar = ['motorway' => 130, 'interstate' => 90, 'city' => 50, 'residential' => 20];
    if (!isset($radar[$road])){
        return "Invalid road!";
    }

    $limit = $radar[$road];

    if ($speed >= $limit && $speed <= $limit + 20){
        return "speeding";
    }else if ($speed > $limit + 20 && $speed <= $limit + 40){
        return "excessive speeding";
    }else if($speed > $limit + 40){
        return "reckless driving";
    }else{
        return "";
    }
}

$speed = intval(rtrim(fgets(STDIN)));
$road = rtrim(fgets(STDIN));

echo isInViolation($speed, $road);