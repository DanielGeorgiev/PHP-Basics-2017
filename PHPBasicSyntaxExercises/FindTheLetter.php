<?php
$string = strtolower(rtrim(fgets(STDIN)));
$tokens = explode(" ", rtrim(fgets(STDIN)));
$letter = strtolower($tokens[0]);
$occurrences = $tokens[1];

$border = 0;
$count = 0;

for ($i = 0; $i < $occurrences; $i++){
    if (strpos($string, $letter, $border) !== false){
        $border = strpos($string, $letter, $border) + 1;
        $count++;
    }else{
        break;
    }
}

if ($count == $occurrences){
    echo $border - 1;
}else{
    echo "Find the letter yourself!";
}