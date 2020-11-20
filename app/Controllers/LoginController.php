<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function index()
    {
        $allowToLogin = true;

        return $this->renderHTML('login.twig', [
            'allow_to_login' => $allowToLogin
        ]);
    }

    public function login($request)
    {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            // $postData['id'];
            // $postData['password'];
            $loginSuccessful = true;
            if ($loginSuccessful) {
                header("Location: /rolecall");
                die();
            }
        }
        return $this->renderHTML('login.twig', [
            'errors' => ['Password or id are wrong.']
        ]);
    }

    public function logout()
    {
        header("Location: /");
        die();
    }
}
