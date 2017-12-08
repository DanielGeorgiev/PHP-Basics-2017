<?php

$sundays = new DatePeriod(
    new DateTime("first Sunday of 2017-9"),
    DateInterval::createFromDateString('next Sunday'),
    new DateTime("next month 2017-9-01")
);

foreach ($sundays as $sunday) {
    $result = $sunday->format("jS F, Y");
    echo $result . "\n";
}