<?php
include 'db_config.php';
include 'Employee.php';

$input = explode(', ', rtrim(fgets(STDIN)));

try {
    if (count($input) < 6){
        throw new Exception();
    }
    $e1 = new Employee($input[0], $input[1], $input[2], $input[3], $input[4], str_replace('Pass ', '', $input[5]));

    $e1->insertEmployee($db);

    echo "New employee $input[0] $input[1] $input[2] saved.";
} catch (Exception $exception) {
    echo "Error: Incorrect input data or existing employee.";
}
