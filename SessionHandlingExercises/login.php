<?php

include "common.php";

$userRepository = new \app\repository\UserRepository($db);
$userService = new \app\service\UserService($userRepository);

$userHttpHandler = new \app\http\UserHttpHandler($template);

$userHttpHandler->login($userService, $_POST);