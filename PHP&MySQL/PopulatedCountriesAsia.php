<?php

include "MyPDO.php";
include "geography_db_config.php";

$db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);

$countries = $db->query('SELECT country_name FROM countries 
                              WHERE population > 1000000000 AND continent_code = "AS"', PDO::FETCH_ASSOC);

foreach ($countries as $country) {
    echo $country['country_name'] . PHP_EOL;
}
