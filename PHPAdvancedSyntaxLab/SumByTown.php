<?php
$input = rtrim(fgets(STDIN));
$arr = explode(', ', $input);
$sums = [];

for ($i = 0; $i < count($arr); $i += 2){
    $town = $arr[$i];
    $income = floatval($arr[$i + 1]);

    if (!isset($sums[$town])){
        $sums[$town] = 0;
    }

    $sums[$town] += $income;
}

print_r($sums);