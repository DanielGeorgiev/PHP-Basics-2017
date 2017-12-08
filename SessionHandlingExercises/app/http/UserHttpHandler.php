<?php
/**
 * Created by PhpStorm.
 * User: schoolboyd
 * Date: 10.11.17
 * Time: 23:36
 */

namespace app\http;


use app\data\UserDTO;
use app\service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService,
                             array $formData = [])
    {
        if (isset($_SESSION['userId']))
        {
            $this->redirect('profile.php');
        }

        if (isset($formData['register'])) {
            $user = UserDTO::create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name'],
                $formData['birthday']
            );

            $result = $userService->registerHandleProccess($user,
                $formData['confirm_password']);

            if ($result) {
                $this->redirect('login.php');
            } else {
                echo "ERROR!";
            }
        } else {
            $this->render('users/register');
        }
    }

    public function login(UserServiceInterface $userService,
                          array $formData = [])
    {
        if (isset($_SESSION['userId']))
        {
            $this->redirect('profile.php');
        }

        if (isset($formData['login'])) {
            $user = UserDTO::create(
                $formData['username'],
                $formData['password']
            );

            $result = $userService->loginHandleProccess($user);

            if ($result) {
                $_SESSION['userId'] = $result->getId();
                $_SESSION['username'] = $result->getUsername();
                $_SESSION['password'] = $formData['password'];
                $_SESSION['firstName'] = $result->getFirstName();
                $_SESSION['lastName'] = $result->getLastName();
                $_SESSION['birthday'] = $result->getBirthday();

                $this->redirect('profile.php');
            } else {
                echo "ERROR!";
            }
        } else {
            $this->render('users/login');
        }
    }

    public function editProfile(UserServiceInterface $userService,
                                array $formData = [])
    {
        if (!isset($_SESSION['userId']))
        {
            $this->redirect('index.php');
        }

        if (isset($formData['edit'])) {
            $user = UserDTO::create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name'],
                $formData['birthday'],
                $_SESSION['userId']
            );

            $userService->editHandleProccess($user);

            $this->render('users/profile');

        } else {
            $this->render('users/profile');
        }
    }

    public function logout(UserServiceInterface $userService)
    {
        $userService->logout();
        $this->redirect('index.php');
    }
}