<?php

namespace app\repository;


use app\data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $user): bool;

    public function findOneByUsername(string $username);

    public function editProfile(UserDTO $user);
}
