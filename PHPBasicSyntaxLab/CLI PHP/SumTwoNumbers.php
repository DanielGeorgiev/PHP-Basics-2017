<?php
$operation = $argv[1];

$firstNumber = floatval(fgets(STDIN));
$secondNumber = floatval(fgets(STDIN));

if ($operation === "sum"){
    echo "== " . ($firstNumber + $secondNumber);
}else if ($operation === "subtract"){
    echo "== " . ($firstNumber - $secondNumber);
}else{
    echo "== Wrong operation supplied!";
}