<?php

namespace App\Controllers;

use App\Models\User;

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
            $user = new User();
            $passwordHashed = hash('sha512', "attendance_school{$postData['password']}");

            if ($user->getPassword($postData['id']) == $passwordHashed) {
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
