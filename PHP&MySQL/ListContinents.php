<?php

include "geography_db_config.php";
include "MyPDO.php";

$db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
$db->setErrorException();

try{
    $continents_stm = $db->query('SELECT * FROM continents');
    $continents = [];

    foreach ($continents_stm as $continent) {
        $continents[$continent['continent_name']] = $continent['continent_code'];
    }

    $output = "";

    foreach ($continents as $code => $name) {
        $output .= "$name ($code), ";
    }

    echo rtrim($output,", ");

} catch (PDOException $exception){
    echo $exception->getMessage() . PHP_EOL;
}