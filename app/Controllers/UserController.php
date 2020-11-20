<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index()
    {
        $users = [
            [
                "id" => 1,
                "name" => "Martin",
                "grade" => 5,
                "attemps" => 0,
                "password" => "12sdasPQs1",
            ],
            [
                "id" => 2,
                "name" => "Campos",
                "grade" => 6,
                "attemps" => 1,
                "password" => "123uiudas)(!",
            ],
        ];

        return $this->renderHTML('user.twig', [
            'users' => $users,
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }
}
