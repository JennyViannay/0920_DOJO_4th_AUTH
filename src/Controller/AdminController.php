<?php

namespace App\Controller;

class AdminController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        if(isset($_SESSION['user']) && $_SESSION['user']->role_id != 1){
            return $this->twig->render('Admin/index.html.twig');
        }
        session_destroy();
        header('Location:/security/login');
    }
}
