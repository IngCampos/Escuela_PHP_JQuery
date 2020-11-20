<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $user = new User();
         return $this->renderHTML('user.twig', [
            'users' => $user->getUsers(),
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }
}
