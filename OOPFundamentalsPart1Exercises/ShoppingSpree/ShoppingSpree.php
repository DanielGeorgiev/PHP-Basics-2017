<?php

include 'Person.php';
include 'Product.php';


$input = rtrim(fgets(STDIN));
preg_match_all('/(\s+|\w+)=-?\d+/', $input, $peopleInput);

$people = [];
try {
    for ($i = 0; $i < count($peopleInput[0]); $i++) {
        $tokens = explode('=', $peopleInput[0][$i]);

        $personName = $tokens[0];
        $money = floatval($tokens[1]);

        $currPerson = new Person($personName, $money);
        $people[$personName] = $currPerson;
    }
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

$input = rtrim(fgets(STDIN));
preg_match_all('/(\s+|\w+)=-?\d+/', $input, $productsInput);


$products = [];
try {
    for ($i = 0; $i < count($productsInput[0]); $i++) {
        $tokens = explode('=', $productsInput[0][$i]);

        $productName = $tokens[0];
        $productCost = floatval($tokens[1]);

        $currProduct = new Product($productName, $productCost);
        $products[$productName] = $currProduct;
    }
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

$input = rtrim(fgets(STDIN));

while ($input !== 'END') {
    $tokens = explode(' ', $input);
    $person = isset($people[$tokens[0]]) ? $people[$tokens[0]] : false;
    $product = isset($products[$tokens[1]]) ? $products[$tokens[1]] : false;

    if ($person !== false) {
        if ($product !== false) {
            try {
                $person->addToProducts($product);
            }catch (Exception $exception){
                echo $exception->getMessage() . PHP_EOL;
            }
        } else {
            echo 'Product doesn\'t exist' . PHP_EOL;
        }
    }

    $input = rtrim(fgets(STDIN));
}

foreach ($people as $person) {
    if (count($person->getProducts()) !== 0) {
        $products = $person->getProducts();

        echo $person->getName() . ' - ';
        for ($i = 0; $i < count($products); $i++) {
            if ($i !== count($products) - 1) {
                echo $products[$i]->getName() . ',';
            } else {
                echo $products[$i]->getName() . PHP_EOL;
            }
        }
    } else {
        echo $person->getName() . ' - Nothing bought' . PHP_EOL;
    }
}
