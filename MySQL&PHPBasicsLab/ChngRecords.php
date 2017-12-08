<?php

$db = new PDO('mysql:host=localhost;dbname=phpcourse', 'root', '');

$input = explode(' ', rtrim(fgets(STDIN)));

$userId = intval($input[0]);
$paramName = $input[1];
$paramValue = $input[2];

$stm = $db->prepare("UPDATE students SET $paramName = :paramValue WHERE student_number = :userId");

$stm->bindParam('paramValue', $paramValue);
$stm->bindParam('userId', $userId);

$stm->execute();
