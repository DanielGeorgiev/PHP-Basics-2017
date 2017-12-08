<?php
$variable = 15;

if(is_numeric($variable)){
    var_dump($variable);
}else{
    echo gettype($variable);
}