<?php

$db = new PDO('mysql:host=localhost;dbname=phpcourse', 'root', 'parola123123');

$input = rtrim(fgets(STDIN));

while ($input != 'end') {
    try {
        $tokens = explode(', ', $input);
        $db->beginTransaction();

        if (studentExists($db, $tokens[2])) {
            $db->rollBack();
            throw new Exception('Student with that number already exists!');
        }else if (!courseExists($db, $tokens[3])){
            $db->rollBack();
            throw new Exception('Course does not exist!');
        }else{
            $stm = $db->prepare('INSERT INTO students(first_name, last_name, student_number) VALUES(?, ?, ?)');
            $stm->bindParam(1, $tokens[0]);
            $stm->bindParam(2, $tokens[1]);
            $stm->bindParam(3, $tokens[2]);

            $stm->execute();

            $studentId = $db->lastInsertId() . PHP_EOL;


            $stm = $db->prepare('SELECT course_id FROM courses WHERE course_name = ?');
            $stm->bindParam(1, $tokens[3]);

            $stm->execute();
            $stm = $stm->fetchAll(PDO::FETCH_ASSOC);

            $courseId = $stm[0]['course_id'];

            $stm = $db->prepare('INSERT INTO student_subscriptions(course_id, student_id) VALUES(?, ?)');
            $stm->bindParam(1, $courseId);
            $stm->bindParam(2, $studentId);

            $stm->execute();

            $db->commit();
        }


        $input = rtrim(fgets(STDIN));
    }
    catch (Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
        $input = rtrim(fgets(STDIN));
    }
}

function studentExists(PDO $db, $studentNumber)
{
    $stm = $db->prepare('SELECT student_id FROM students WHERE student_number = ?');
    $stm->bindParam(1, $studentNumber);
    $stm->execute();

    return $stm->rowCount() > 0;
}

function courseExists(PDO $db, $courseName)
{
    $stm = $db->prepare('SELECT course_name FROM courses WHERE course_name = ?');
    $stm->bindParam(1, $courseName);
    $stm->execute();

    return $stm->rowCount() > 0;
}