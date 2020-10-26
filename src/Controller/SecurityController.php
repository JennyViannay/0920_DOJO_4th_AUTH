<?php

namespace App\Controller;

use App\Model\UserManager;

class SecurityController extends AbstractController
{
    public function login()
    {
        // call new UserManager
        // prepare $error = null
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // check password + email not empty
            // if not empty :
                // check email exist ? selectOneByEmail()
                // true : 
                    // check password is ok
                    // true :
                        // set session['user] = user
                        // redirect to '/'
                        
                    // false :
                        // $error = 'Password incorrect !';
                // false :
                    // $error = 'User not found';
            // empty :
                // $error = 'Tous les champs sont obligatoires !';
        }
        return $this->twig->render('Security/login.html.twig', ['error' => $error]);
    }

    public function register()
    {
        // call new UserManager
        // prepare $error = null
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // check password + password2 + email not empty
                // if not empty :
                    // check email/user exist ? selectOneByEmail()
                    // false
                    // $error = 'Email already exist';
                // if password != password2
                    // $error = 'Password do not match';
                // if error is empty
                    // create new $user array with key email & password hash (md5()) 
                    // & role_id = 2
                    // use insert() from UserManager to insert $user et get back new $id
                    // set session with user from $userManager->selectOnById($id)
                    // redirect to '/'
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
