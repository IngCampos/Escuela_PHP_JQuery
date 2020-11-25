<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Logout;

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
            $userLogin = $user->findId($postData['id']);
            if ($userLogin->password == $passwordHashed) {
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
        $logout = new Logout();
        $user_id = 101;
        $data = ["user_id" => $user_id];

        $logout->save($data);
        header("Location: /");
        die();
    }
}
