<?php

include "db_config.php";
include "Employee.php";

$input = explode(', ', rtrim(fgets(STDIN)));

$employee = new Employee($input[0], $input[1], $input[2], $input[3], $input[4], $input[5], $input[6]);

$employee->insertEmployee($db);

