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
                $emailInfo = explode(':', $input[$i]);
                $emailType = (isset($emailInfo[0])) ? $emailInfo[0] : null;
                $emailName = (isset($emailInfo[1])) ? $emailInfo[1] : null;

                if ($emailType != null && $emailName != null) {
                    $employee->insertEmail($db, $emailName, $emailType, $ids[0]);
                } else {
                    throw new Exception('Error: Please, check your email input syntax.');
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
                $emailInfo = explode(':', $input[$i]);
                $emailType = (isset($emailInfo[0])) ? $emailInfo[0] : null;
                $emailName = (isset($emailInfo[1])) ? $emailInfo[1] : null;

                if ($emailName != null && $emailType != null) {
                    $employee->insertEmail($db, $emailName, $emailType, $id);
                }
            }

            echo 'Emails of ' . $employee->getFirstName()
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