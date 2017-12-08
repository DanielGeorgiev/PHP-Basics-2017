<?php
$firstNumber = intval(fgets(STDIN));
$secondNumber = intval(fgets(STDIN));

if($firstNumber < $secondNumber) {
    for ($i = $firstNumber; $i <= $secondNumber; $i++) {
        echo "$i\n";
    }
}else{
    for ($i = $secondNumber; $i <= $firstNumber; $i++) {
        echo "$i\n";
    }
}