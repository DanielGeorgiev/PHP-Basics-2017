<?php
$largest = PHP_INT_MIN;

for ($i = 0; $i < 3; $i++){
    $number = floatval(fgets(STDIN));
    if ($number > $largest){
        $largest = $number;
    }
}

echo "Max: " . $largest;