<?php
function isUniqueNumber($number){
    $number = (string)$number;
    $digits = str_split($number);

    return ($digits[0] !== $digits[1]) && ($digits[0] !== $digits[2]) && ($digits[1] !== $digits[2]);
}

$n = intval(rtrim(fgets(STDIN)));

$numbers = [];

for ($number = 102; $number <= $n; $number++){
    if (isUniqueNumber($number)){
        $numbers[] = $number;
    }
    if ($number === 987){
        break;
    }
}

if ($n < 102){
    echo "no";
}else{
    echo implode(", ", $numbers);
}






