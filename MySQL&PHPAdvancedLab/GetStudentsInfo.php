<?php

$db = new PDO('mysql:host=localhost;dbname=phpcourse', 'root', 'parola123123');

$students = $db->query('CALL GetStudentsInfo()');

$students = $students->fetchAll(PDO::FETCH_ASSOC);

foreach ($students as $student) {
    echo implode(', ', $student) . PHP_EOL;
}