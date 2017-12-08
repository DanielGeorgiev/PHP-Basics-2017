<?php

include "geography_db_config.php";
include "MyPDO.php";

$db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
$db->setErrorException();

try {
    $continents = $db->query('SELECT * FROM continents');

    foreach ($continents as $continent) {
        print_r($continent);
        echo "\n\r";
    }
    $db = null;
}catch (PDOException $exception){
    echo $exception->getMessage() . PHP_EOL;
}
