<?php

namespace App\Controller;

use App\Model\UserManager;

class SecurityController extends AbstractController
{
    public function login()
    {
        $userManager = new UserManager();
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $user = $userManager->selectOneByEmail($_POST['email']);
                if ($user) {
                    if ($user->password === md5($_POST['password'])) {
                        $_SESSION['user'] = $user;;
                        header('Location:/');
                    } else {
                        $error = 'Password incorrect !';
                    }
                } else {
                    $error = 'User not found';
                }
            } else {
                $error = 'Tous les champs sont obligatoires !';
            }
        }
        return $this->twig->render('Security/login.html.twig', ['error' => $error]);
    }

    public function register()
    {
        $userManager = new UserManager();
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                !empty($_POST['email']) &&
                !empty($_POST['password']) &&
                !empty($_POST['password2'])
            ) {
                $user = $userManager->selectOneByEmail($_POST['email']);
                if ($user) {
                    $error = 'Email already exist';
                }
                if ($_POST['password'] != $_POST['password2']) {
                    $error = 'Password do not match';
                }
                if ($error === null) {
                    $user = [
                        'email' => $_POST['email'],
                        'password' => md5($_POST['password']),
                        'role_id' => 2
                    ];
                    $userId = $userManager->insert($user);
                    $user = $userManager->selectOneById($userId);
                    if ($user) {
                        $_SESSION['user'] = $user;
                        header('Location:/');
                    }
                }
            }
        }
        return $this->twig->render('Security/register.html.twig', ['error' => $error]);
    }

    /** 
     * Display infos $user
     */
    public function account()
    {
        return $this->twig->render('User/account.html.twig', ['user' => $this->getUser()]);
    }

    /** 
     * Return $user
     */
    public function getUser()
    {
        $userManager = new UserManager();
        return $userManager->selectOneById($_SESSION['user']->id);
    }

    public function logout()
    {
        session_destroy();
        header('Location:/');
    }
}
