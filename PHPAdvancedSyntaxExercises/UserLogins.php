<?php
$input = rtrim(fgets(STDIN));

$registeredUsers = [];
while($input != 'login'){
    $tokens = explode(' -> ', $input);
    $username = $tokens[0];
    $password = $tokens[1];

    $registeredUsers[$username] = $password;

    $input = rtrim(fgets(STDIN));
}

$input = rtrim(fgets(STDIN));

$unscsLoginAttempts = 0;
while ($input != 'end'){
    $tokens = explode(' -> ', $input);
    $username = $tokens[0];
    $password = $tokens[1];

    $unscsLoginAttempts++;

    if (isset($registeredUsers[$username])){
        if ($registeredUsers[$username] === $password){
            echo "$username: logged in successfully\n";
        }else{
            echo "$username: login failed\n";
        }
    }else{
        echo "$username: login failed\n";
    }

    $input = rtrim(fgets(STDIN));
}

echo "unsuccessful login attempts: $unscsLoginAttempts";



