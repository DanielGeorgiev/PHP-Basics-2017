<?php

function isInsideVolume($x, $y, $z){
    $x1 = 10;
    $x2 = 50;
    $y1 = 20;
    $y2 = 80;
    $z1 = 15;
    $z2 = 50;

    if ($x >= $x1 && $x <= $x2){
        if ($y >= $y1 && $y <= $y2){
            if ($z >= $z1 && $z <= $z2){
                return true;
            }
        }
    }

    return false;
}

$input = rtrim(fgets(STDIN));
$points = array_map(function ($x){
    return floatval($x);
}, explode(', ', $input));

if (count($points) % 3 !== 0){
    echo 'Invalid input!';
    return;
}

for ($i = 0; $i < count($points); $i+=3){
    $x = $points[$i];
    $y = $points[$i + 1];
    $z = $points[$i + 2];

    if (isInsideVolume($x, $y, $z)){
        echo "inside\n";
    }else{
        echo "outside\n";
    }
}
