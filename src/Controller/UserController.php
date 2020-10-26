<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{

    /**
     * Display account user page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function account()
    {
        return $this->twig->render('User/account.html.twig');
    }
}
