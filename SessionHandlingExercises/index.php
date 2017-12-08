<?php

include "common.php"; 

$homeRepo = new \app\repository\HomeRepository($db);
$homeService = new \app\service\HomeService($homeRepo);

$homeHttpHandler = new \app\http\HomeHttpHandler($template);
$homeHttpHandler->index();
