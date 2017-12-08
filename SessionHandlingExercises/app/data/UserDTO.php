<?php

namespace app\data;


class UserDTO
{
    private $id;

    private $username;

    private $password;

    private $firstName;

    private $lastName;

    private $birthday;

    public static function create(string $username,
                                  string $password,
                                  string $firstName = null,
                                  string $lastName = null,
                                  string $birthday = null, int $id = null)
    {
        $user = new UserDTO();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setBirthday($birthday);
        $user->setId($id);

        return $user;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }
}