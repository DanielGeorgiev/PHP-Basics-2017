<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

session_start();

if (isset($_GET['first_name'])) {
    echo 'Your name is: ' . $_GET['first_name'];
    $_SESSION['first_name'] = $_GET['first_name'];

} else if (isset($_SESSION['first_name'])) {
    echo 'Hello ' . $_SESSION['first_name'];

} else {
    echo 'What is your name: <form><input type="text" name="first_name"/></form>';
}
