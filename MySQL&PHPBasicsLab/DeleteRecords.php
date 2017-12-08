<?php

$db = new PDO('mysql:host=localhost;dbname=phpcourse', 'root', '');

$userId = intval(rtrim(fgets(STDIN)));

$stm = $db->prepare('DELETE FROM students WHERE student_number = :id');

$stm->bindParam('id', $userId);

$stm->execute();

