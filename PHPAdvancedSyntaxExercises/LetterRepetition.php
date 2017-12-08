<?php
$string = rtrim(fgets(STDIN));

$letters = [];
for ($i = 0; $i < strlen($string); $i++){
    $letter = $string[$i];
    if (!isset($letters[$letter])){
        $letters[$letter] = 0;
    }

    $letters[$letter]++;
}

foreach ($letters as $letter => $occurrences){
    echo "$letter -> $occurrences\n";
}