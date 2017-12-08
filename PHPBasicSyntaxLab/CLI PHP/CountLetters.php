<?php
$word = fgets(STDIN);
$letterCounter = [];

for ($i = 0; $i < strlen($word) - 1; $i++){
    $letter = $word[$i];
    if (array_key_exists($letter, $letterCounter)){
        $letterCounter[$letter]++;
    }else{
        $letterCounter[$letter] = 1;
    }
}

foreach ($letterCounter as $key => $value) {
    echo "$key -> $value\n";
}