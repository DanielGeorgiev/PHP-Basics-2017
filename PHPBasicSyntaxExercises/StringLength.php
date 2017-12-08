<?php
$string = rtrim(fgets(STDIN));

if (strlen($string) >= 0 && strlen($string) < 20){
    $length = strlen($string);
    for ($i = 0; $i < 20 - $length; $i++){
        $string = $string . "*";
    }
}else {
    $string = substr($string,0, 20);
}

echo $string;