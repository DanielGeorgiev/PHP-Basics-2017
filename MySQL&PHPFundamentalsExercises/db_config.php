<?php

$db_host = 'localhost';
$db_name = 'geography';
$db_user = 'root';
$db_password = '';

$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
