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
        // TODO : ACCESS ONLY FOR USER LOGGED WITH ADMIN ROLE
        header('Location:/security/login');
    }
}
