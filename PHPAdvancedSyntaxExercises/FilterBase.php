<?php

$input = rtrim(fgets(STDIN));

$Salary = [];
$Age = [];
$Position = [];

while ($input !== "filter base"){
    $tokens = explode(' -> ', $input);
    $name = $tokens[0];
    $parameter = $tokens[1];

    if (preg_match('/\b([0-9]+[.])[0-9]+\b/',$parameter)){
        $Salary[$name] =  number_format($parameter, 2);
    }else if (preg_match('/^\b\d+\b$/', $parameter)){
        $Age[$name] = $parameter;
    }else{
        $Position[$name] = $parameter;
    }

    $input = rtrim(fgets(STDIN));
}

$input = rtrim(fgets(STDIN));

if ($input === "Salary"){
    foreach ($Salary as $name => $salary) {
        echo "Name: $name\n";
        echo "Salary: $salary\n";
        echo "====================\n";
    }
}else if ($input === "Position"){
    foreach ($Position as $name => $position) {
        echo "Name: $name\n";
        echo "Position: $position\n";
        echo "====================\n";
    }
}else if ($input === "Age"){
    foreach ($Age as $name => $age) {
        echo "Name: $name\n";
        echo "Age: $age\n";
        echo "====================\n";
    }
}


