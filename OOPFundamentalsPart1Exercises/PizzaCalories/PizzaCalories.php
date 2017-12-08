<?php
include 'Pizza.php';
include 'Topping.php';
include 'Dough.php';

try {
    $input = explode(' ', rtrim(fgets(STDIN)));
    $toppingsNumber = intval($input[2]);
    $pizza = new Pizza($input[1], intval($input[2]));

    $input = explode(' ', rtrim(fgets(STDIN)));
    $dough = new Dough($input[1], $input[2], intval($input[3]));
    $pizza->setDough($dough);

    for ($i = 0; $i < $toppingsNumber; $i++) {
        $input = explode(' ', rtrim(fgets(STDIN)));
        $currTopping = new Topping($input[1], intval($input[2]));
        $pizza->addTopping($currTopping);
    }

    echo $pizza->getName() . ' - ' . str_replace(',', '', (string)number_format($pizza->getTotalCalories(), 2)) . ' Calories.';
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

