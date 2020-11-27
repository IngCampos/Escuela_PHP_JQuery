<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{   
    public function index()
    {
        // TODO: Implement pagination
        // TODO: show if the user is admin, teacher or student
        if ($_SESSION['userType'] != 1)
            // if the user is not an administrator
            return parent::redirectTypeUser($_SESSION['userType']);

        $user = new User();
         return $this->renderHTML('user.twig', [
            'users' => $user->getAll(),
            'login' => [
                "name" => $_SESSION['userName']
            ]
        ]);
    }
}
