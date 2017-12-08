<?php

namespace app\repository;


use app\data\UserDTO;
use database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function insert(UserDTO $user): bool
    {
        $stm = $this->db->prepare('INSERT INTO users 
                           (username, 
                            password, 
                            first_name, 
                            last_name, 
                            birthday) 
                            VALUES
                            (?, ?, ?, ?, ?)');

        $stm->execute([$user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBirthday()]);

        return true;
    }

    public function findOneByUsername(string $username)
    {
        $stm = $this->db->prepare('SELECT id, 
        username, 
        password, 
        first_name AS firstName, 
        last_name AS lastName,
        birthday FROM users WHERE username = ?');

        $resultSet = $stm->execute([$username]);

        return $resultSet->fetch(UserDTO::class)->current();
    }

    public function editProfile(UserDTO $user): bool
    {
        $stm = $this->db->prepare('UPDATE users SET username = ?,
                                  password = ?,
                                  first_name = ?,
                                  last_name = ?,
                                  birthday = ? 
                                  WHERE id = ?');

        $stm->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBirthday(),
            $user->getId()
        ]);

        return true;
    }
}
