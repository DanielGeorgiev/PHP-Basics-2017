<?php

include '../MyPDO.php';
include '../geography_db_config.php';

$db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);

$customerInput = rtrim(fgets(STDIN));

$stm = null;

if (mb_strlen($customerInput) === 3)
{
    $stm = $db->prepare('SELECT a.country_name, a.capital, b.description, c.continent_name 
                            FROM countries AS a, currencies AS b, continents AS c 
                            WHERE a.iso_code = :customer_input 
                            AND  b.currency_code = a.currency_code 
                            AND  c.continent_code = a.continent_code;');
} else if (mb_strlen($customerInput) === 2)
{
    $stm = $db->prepare('SELECT a.country_name, a.capital, b.description, c.continent_name 
                            FROM countries AS a, currencies AS b, continents AS c 
                            WHERE a.country_code = :customer_input 
                            AND  b.currency_code = a.currency_code 
                            AND  c.continent_code = a.continent_code;');
}

$stm->bindParam('customer_input', $customerInput);
$stm->execute();

foreach ($stm as $prop) {
    echo 'Country: ' . mb_convert_encoding($prop['country_name'] . PHP_EOL, 'UTF-8');
    echo 'Capital: ' . mb_convert_encoding($prop['capital'] . PHP_EOL, 'UTF-8');
    echo 'Currency: ' . mb_convert_encoding($prop['description'] . PHP_EOL, 'UTF-8');
    echo 'Continent: ' . mb_convert_encoding($prop['continent_name'] . PHP_EOL, 'UTF-8');
    $countryCode = $db->prepare('SELECT country_code FROM countries WHERE country_name = :country_name');
    $countryCode->bindParam('country_name', $prop['country_name']);
    $countryCode->execute();

    foreach ($countryCode as $item) {
        $countryCode = $item['country_code'];
    }

    $isMountainCountry = $db->prepare('SELECT mountain_id FROM mountains_countries WHERE country_code = :country_code');
    $isMountainCountry->bindParam('country_code', $countryCode);
    $isMountainCountry->execute();

    foreach ($isMountainCountry as $item) {
        echo PHP_EOL;
        echo 'Forward customer for special offers!';
        break;
    }
}


