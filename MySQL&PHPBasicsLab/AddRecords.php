<?php

$db = new PDO('mysql:host=localhost;dbname=phpcourse', 'root', '');

$lines = intval(rtrim(fgets(STDIN)));

for ($i = 0; $i < $lines; $i++) {
    $studentInfo = explode(' ', rtrim(fgets(STDIN)));

    $stm = $db->prepare('INSERT INTO students (first_name, last_name, student_number, phone) 
                            VALUES (:first_name, :last_name, :student_number, :phone)');

    $stm->bindParam('first_name', $studentInfo[0]);
    $stm->bindParam('last_name', $studentInfo[1]);
    $stm->bindParam('student_number', intval($studentInfo[2]));
    $stm->bindParam('phone', $studentInfo[3]);

    $stm->execute();
}
