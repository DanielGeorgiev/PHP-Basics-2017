<?php
    require 'Father.php';
    require 'Son.php';
    require 'GrandSon.php';


    $father = new Father('James Patkanoff', 1873, 1923);

    $son1 = new Son('Ivan Patkanoff', 1894, 1928);
    $son2 = new Son('Sasho Patkanoff', 1899, 1970);

    $grandson1 = new GrandSon('Genko Vnu4ata', 1927, 1992);
    $grandson2 = new GrandSon('Senko Vnu4ata', 1927, 1967);
    $grandson3 = new GrandSon('Penko Vnu4ata', 1931, 2000);

    $fathers = array($father);

    $sons = array($son1, $son2);

    $grandsons = array($grandson1, $grandson2, $grandson3);

    function CaclAverageTimespan($generation){

    }