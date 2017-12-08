<?php

include '../geography_db_config.php';
include '../MyPDO.php';

$db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);

$input = rtrim(fgets(STDIN));

while ($input != 'Bye') {
    $stm = $db->prepare('SELECT * from countries 
                      WHERE country_name = :customer_location
                      OR iso_code = :customer_location 
                      OR country_code = :customer_location');

    $stm->bindParam('customer_location', $input);

    if ($stm->execute()) {
        foreach ($stm as $item) {
            echo 'Country: ' . mb_convert_encoding($item['country_name'] . PHP_EOL, 'utf-8');
            echo 'Capital: ' . mb_convert_encoding($item['capital'] . PHP_EOL, 'utf-8');
        }
    }

    $input = rtrim(fgets(STDIN));
}

echo 'Goodbye!' . PHP_EOL;

