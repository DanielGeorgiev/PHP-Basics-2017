<?php

class Math
{
    function sum($a, $b)
    {
        return $a + $b;
    }

    function div($a, $b)
    {
        if (!$this->isZero($b)) {
            return $a / $b;
        }

        return 'Division by 0 is not possible!';
    }

    function isZero($x)
    {
        return $x == 0;
    }
}

$math = new Math();
$firstNumber = rtrim(fgets(STDIN));
$secondNumber = rtrim(fgets(STDIN));
$operation = rtrim(fgets(STDIN));

switch ($operation){
    case "division":
        $result = $math->div($firstNumber, $secondNumber);
        break;
    case "sum":
        $result = $math->sum($firstNumber, $secondNumber);
        break;

}

echo $result;




