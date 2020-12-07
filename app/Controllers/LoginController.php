<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Login;
use App\Models\Logout;
use Zend\Diactoros\Response\RedirectResponse;

class LoginController extends BaseController
{
    public function index()
    {
        if (isset($_SESSION['userId']) && isset($_SESSION['userType']))
            return parent::redirectTypeUser($_SESSION['userType']);

        $allowToLogin = true;

        return $this->renderHTML('login.twig', [
            'allow_to_login' => $allowToLogin
        ]);
    }

    public function login($request)
    {
        // TODO: Implement a logic to set a time in the section as the first version worked
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $user = new User();
            $passwordHashed = hash('sha512', "attendance_school{$postData['password']}");
            $userLogin = $user->findId($postData['id']);

            $login = new Login();
            if ($userLogin->password == $passwordHashed) {
                $_SESSION['userId'] = $userLogin->id;
                $_SESSION['userName'] = $userLogin->name;
                $_SESSION['userType'] = $userLogin->type_user_id;

                $data = ["user_id" => $_SESSION['userId'], 'is_successful' => 1];
                $login->save($data);

                return parent::redirectTypeUser($_SESSION['userType']);
            }
            $data = ["user_id" => $postData['id'], 'is_successful' => 0];
            $login->save($data);
        }

        return $this->renderHTML('login.twig', [
            'errors' => ['Password or id are wrong.'],
            'allow_to_login' => true
        ]);
    }

    public function logout()
    {
        $logout = new Logout();
        $data = ["user_id" => $_SESSION['userId']];
        $logout->save($data);

        session_destroy();
        unset($_SESSION['userId']);
        unset($_SESSION['userType']);
        unset($_SESSION['userName']);
        return new RedirectResponse('/');
    }
}
