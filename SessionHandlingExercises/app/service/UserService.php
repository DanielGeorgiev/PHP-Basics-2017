<?php

namespace app\service;


use app\data\UserDTO;
use app\repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function registerHandleProccess(UserDTO $userDTO, $confirmPassword): bool
    {
        if ($userDTO->getPassword() != $confirmPassword) {
            return false;
        }

        if ($this->userRepository->findOneByUsername($userDTO->getUsername()) != null) {
            return false;
        }

        $plainPassword = $userDTO->getPassword();
        $userDTO->setPassword(password_hash($plainPassword, PASSWORD_BCRYPT));

        return $this->userRepository->insert($userDTO);
    }

    public function loginHandleProccess(UserDTO $userDTO)
    {
        $user = $this->userRepository->findOneByUsername($userDTO->getUsername());

        if ($user == null) {
            return false;
        }

        $currPassword = $userDTO->getPassword();

        $userPassHash = $user
            ->getPassword();

        if (password_verify($currPassword, $userPassHash)) {
            return $user;
        } else {
            return false;
        }
    }

    public function editHandleProccess(UserDTO $userDTO)
    {
        $_SESSION['username'] = $userDTO->getUsername();
        $_SESSION['password'] = $userDTO->getPassword();
        $_SESSION['firstName'] = $userDTO->getFirstName();
        $_SESSION['lastName'] = $userDTO->getLastName();
        $_SESSION['birthday'] = $userDTO->getBirthday();

        $userDTO->setPassword(password_hash($userDTO->getPassword(), PASSWORD_BCRYPT));
        $this->userRepository->editProfile($userDTO);
    }

    public function logout()
    {
        session_destroy();
    }
}