<?php
$numbers = explode(' ', rtrim(fgets(STDIN)));

$numberCounter = [];


foreach ($numbers as $number){
    if (!isset($numberCounter[$number])){
        $numberCounter[$number] = 0;
    }

    $numberCounter[$number]++;
}

ksort($numberCounter);
foreach($numberCounter as $number => $occurrences){
    echo "$number -> $occurrences times\n";
}

