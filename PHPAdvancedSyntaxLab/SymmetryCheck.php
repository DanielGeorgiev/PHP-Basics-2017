<?php
function isPalindrome($string){
    return strrev($string) === $string;
}

$string = rtrim(fgets(STDIN));

if (isPalindrome($string)){
    echo "true";
}else{
    echo "false";
}

