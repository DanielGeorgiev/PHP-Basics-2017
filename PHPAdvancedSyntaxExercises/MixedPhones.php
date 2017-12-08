<?php
$input = rtrim(fgets(STDIN));

$phonebook = [];
while ($input !== 'Over'){
    preg_match('/\b\d+\b/', $input, $phoneMatch);
    $input = preg_replace('/\b\d+\b/','', $input);
    preg_match('/\w+/', $input, $nameMatch);
    $phone = $phoneMatch[0];
    $contactName = $nameMatch[0];

    $phonebook[$contactName] = $phone;

    $input = rtrim(fgets(STDIN));
}

ksort($phonebook);

foreach ($phonebook as $contact => $phone) {
    echo "$contact -> $phone\n";
}
