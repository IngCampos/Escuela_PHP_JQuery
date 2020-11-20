<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function index()
    {
        $allowToLogin = true;

        return $this->renderHTML('login.twig', [
            'errors' => [],
            'allow_to_login' => $allowToLogin
        ]);
    }

    public function logout()
    {
        $allowToLogin = true;

        return $this->renderHTML('login.twig', [
            'errors' => [],
            'allow_to_login' => $allowToLogin
        ]);
    }
}
