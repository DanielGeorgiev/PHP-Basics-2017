<?php

interface CallableInterface
{
    public function call($phoneNumber);
}

interface BrowsableInterface
{
    public function browseTheNet($link);
}

class Smartphone implements CallableInterface, BrowsableInterface
{
    public function call($phoneNumber)
    {
        $isValid = true;

        for ($i = 0; $i < strlen($phoneNumber); $i++) {
            if (!is_numeric($phoneNumber[$i])){
                $isValid = false;
                break;
            }
        }

        if ($isValid){
            echo "Calling... $phoneNumber". PHP_EOL;
        } else{
            echo "Invalid number!" . PHP_EOL;
        }
    }

    public function browseTheNet($link)
    {
        $isValid = true;

        for ($i = 0; $i < strlen($link); $i++) {
            if (is_numeric($link[$i])) {
                $isValid = false;
                break;
            }
        }

        if ($isValid) {
            echo "Browsing: $link!" . PHP_EOL;
        } else {
            echo "Invalid URL!" . PHP_EOL;
        }
    }
}

$smartphone = new Smartphone();

$phoneNumbers = explode(' ', rtrim(fgets(STDIN)));

for ($i = 0; $i < count($phoneNumbers); $i++) {
    $smartphone->call($phoneNumbers[$i]);
}

$links = explode(' ', rtrim(fgets(STDIN)));

for ($i = 0; $i < count($links); $i++) {
    $smartphone->browseTheNet($links[$i]);
}



