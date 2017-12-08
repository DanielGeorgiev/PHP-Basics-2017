<?php

include 'db_config.php';
include 'Employee.php';

$input = explode(', ', rtrim(fgets(STDIN)));

if ($input[0] == 'Info') {
    $employee = new Employee($input[1], null, $input[2]);

    $count = 0;
    foreach ($employee->getInfo($db) as $inf) {
        if ($count >= 1){
            echo '-------------------------------' . PHP_EOL;
        }

        echo implode(', ', $inf) . PHP_EOL;
        $count++;
    }
}