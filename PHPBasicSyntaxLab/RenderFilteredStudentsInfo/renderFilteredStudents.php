<?php
if(isset($_GET['names'], $_GET['ages'])){
    $delimiter = $_GET['delimiter'];

    $names = explode($delimiter, $_GET['names']);
    $ages = explode($delimiter, $_GET['ages']);
}

include 'renderFilteredStudents_frontend.php';