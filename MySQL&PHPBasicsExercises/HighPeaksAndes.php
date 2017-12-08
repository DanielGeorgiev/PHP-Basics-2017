<?php

include 'geography_db_config.php';
include 'MyPDO.php';


$db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);

$peaks = $db->query('SELECT * from peaks WHERE mountain_id = 3 AND elevation > 6700', PDO::FETCH_ASSOC);

foreach ($peaks as $peak) {
    echo $peak['peak_name'] . ', ' . $peak['elevation'] . PHP_EOL;
}