<?php
include 'db_config.php';
include 'Employee.php';

$input = explode(', ', rtrim(fgets(STDIN)));


try {
    if (!is_numeric($input[0])) {
        $employee = new Employee($input[0], $input[1], $input[2]);

        $ids = $employee->getIds($db);

        if (count($ids) == 1) {
            for ($i = 4; $i < count($input); $i++) {
                $phoneInfo = explode(':', $input[$i]);
                $phoneType = (isset($phoneInfo[0])) ? $phoneInfo[0] : null;
                $phoneNumber = (preg_match('/^\s\+[0-9]+$/', $phoneInfo[1])) ? $phoneInfo[1] : null;

                if ($phoneType != null && $phoneNumber != null) {
                    $employee->insertPhone($db, $phoneNumber, $phoneType, $ids[0]);
                } else {
                    throw new Exception('Error: Please, check your phone input syntax.');
                }
            }
        } else if (count($ids) > 1) {
            echo "Ids of employees with this name: " . implode(', ', $ids);
        } else {
            throw new Exception('Error: Employee with that name does not exist!');
        }
    } else {
        $employee = new Employee($input[1], $input[2], $input[3]);

        $id = intval($input[0]);

        if ($employee->exists($db, $id)) {
            for ($i = 5; $i < count($input); $i++) {
                $phoneInfo = explode(':', $input[$i]);
                $phoneType = (isset($phoneInfo[0])) ? $phoneInfo[0] : null;
                $phoneNumber = (preg_match('/^\s\+[0-9]+$/', $phoneInfo[1])) ? $phoneInfo[1] : null;

                if ($phoneType != null && $phoneNumber != null) {
                    $employee->insertPhone($db, $phoneNumber, $phoneType, $id);
                } else{
                    throw new Exception('Error: Please, check you phone input syntax.');
                }
            }

            echo 'Phones of ' . $employee->getFirstName()
                . ' ' . $employee->getMiddleName()
                . ' ' . $employee->getLastName()
                . ' saved'
                . PHP_EOL;
        } else {
            throw new Exception('Error: Employee does not exist!');
        }
    }
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}