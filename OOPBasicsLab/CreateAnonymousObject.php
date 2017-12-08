<?php

$player = new stdClass();

$player->nickname = 'k3l3643t0';
$player->attack = 25;
$player->defense = 14;
$player->age = 17;
$player->specialPower = 'Kick in the mouth';
$player->isAlive = true;
$player->nationality = 'Bulgarian';
$player->money = 0.05;
$player->diamonds = 3;

foreach ($player as $propertyN => $propertyV) {
    echo "$propertyN -> $propertyV \n";
}