<?php
$input = rtrim(fgets(STDIN));
$elements = explode(', ', $input);

$uniqueElements = [];

for ($i = 0; $i < count($elements); $i++){
    $element = $elements[$i];

    if (!isset($uniqueElements[$element])){
        $uniqueElements[$element] = 0;
    }

    $uniqueElements[$element]++;
}

foreach ($uniqueElements as $element => $occurrences){
    if ($occurrences <= 1){
        echo "$element ";
    }
}