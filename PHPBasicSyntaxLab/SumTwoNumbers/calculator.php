<?php
if(isset($_GET['calculate'])) {
    $result = 0;
    switch ($_GET['operation']) {
        case "sum":
            $result = floatval($_GET['firstNumber']) + floatval($_GET['secondNumber']);
            break;
        case "subtract":
            $result = floatval($_GET['firstNumber']) - floatval($_GET['secondNumber']);
            break;
    }
}

include 'calculator_frontend.php';
