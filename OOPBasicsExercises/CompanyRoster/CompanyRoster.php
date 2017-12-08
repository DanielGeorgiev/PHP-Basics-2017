<?php

include 'Employee.php';

$employeesCount = intval(fgets(STDIN));

$departments = [];
for ($i = 0; $i < $employeesCount; $i++){
    $input = explode(' ', rtrim(fgets(STDIN)));

    $employeeName = $input[0];
    $salary = $input[1];
    $pos = $input[2];
    $department = $input[3];
    $email = '';
    $age = '';

    if (count($input) == 5){
        if (preg_match('/\d+/', $input[4])){
            $age = $input[4];
        }else{
            $email = $input[4];
        }
    }else if (count($input) == 6){
        $email = $input[4];
        $age = $input[5];
    }

    $currEmployee = new Employee($employeeName,$salary, $pos, $department, $email, $age);
    $departments[$department][] = $currEmployee;
}

$highestAvgSalary = 0.0;
$highestAvgSalaryDep = '';

foreach ($departments as $department => $employees) {
    $avg = 0;
    foreach ($employees as $employee) {
        $avg += $employee->getSalary();
    }
    $avg /= count($employees);

    if ($avg > $highestAvgSalary){
        $highestAvgSalary = $avg;
        $highestAvgSalaryDep = $department;
    }
}

echo "Highest Average Salary: $highestAvgSalaryDep\n";

$highestAvgSalaryEmployees = $departments[$highestAvgSalaryDep];
usort($highestAvgSalaryEmployees, function ($emp1, $emp2){
    return $emp1->getSalary() < $emp2->getSalary();
});
foreach ($highestAvgSalaryEmployees as $employee) {
    echo $employee;
}



