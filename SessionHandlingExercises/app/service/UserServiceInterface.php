<?php

namespace app\service;


use app\data\UserDTO;

interface UserServiceInterface
{
    public function registerHandleProccess(UserDTO $userDTO, $confirmPassword): bool;

    public function loginHandleProccess(UserDTO $userDTO);

    public function editHandleProccess(UserDTO $userDTO);

    public function logout();
}