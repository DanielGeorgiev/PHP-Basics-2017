<?php
$input = rtrim(fgets(STDIN));

$products = [];

while ($input !== "shopping time"){
        $tokens = explode(' ', $input);
        $operation = $tokens[0];
        $product = $tokens[1];
        $quantity = $tokens[2];

        switch ($operation){
            case "stock":
                if (!isset($products[$product])){
                    $products[$product] = 0;
                }

                $products[$product] += $quantity;
                break;
            default:
                echo "Did you mean: stock {productName} {quantity}?";
                break;
        }

        $input = rtrim(fgets(STDIN));
}

$input = rtrim(fgets(STDIN));

while ($input !== "exam time"){
    $tokens = explode(' ', $input);
    $operation = $tokens[0];
    $product = $tokens[1];
    $quantity = $tokens[2];

    switch ($operation){
        case "buy":
            if (!isset($products[$product])){
                echo "$product doesn't exist";
            }else{
                $products[$product] -= $quantity;
            }
            break;
        default:
            echo "Did you mean: buy {productName} {quantity}?";
            break;
    }

    $input = rtrim(fgets(STDIN));
}

$filteredProducts = array_filter($products, function ($x){
    return $x > 0;
});

foreach ($filteredProducts as $product => $quantity) {
    echo "$product -> $quantity";
}
