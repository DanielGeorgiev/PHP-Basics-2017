<?php
$line = trim(fgets(STDIN));
$largest = PHP_INT_MIN;

while(!empty($line)){
    $number = floatval($line);
    if ($number > $largest){
        $largest = $number;
    }
    $line = trim(fgets(STDIN));
}

echo "Max: $largest";