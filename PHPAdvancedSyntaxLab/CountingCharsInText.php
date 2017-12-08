<?php
$string = str_replace(' ', '', (rtrim(strtolower(fgets(STDIN)))));

$counter = [];

for ($i = 0; $i < strlen($string); $i++){
    $currentChar = $string[$i];
    if (!isset($counter[$currentChar])){
        $counter[$currentChar] = 0;
    }
    $counter[$currentChar]++;
}

$count = 0;
echo "[";
foreach ($counter as $letter => $occurrences){
    if ($count !== count($counter)-1){
        echo "\"$letter\" => \"$occurrences\",";
    }else{
        echo "\"$letter\" => \"$occurrences\"";
    }
    $count++;
}
echo "]";
