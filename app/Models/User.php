<?php

namespace App\Models;

class User extends Base
{
    private $table = 'users';

    function __construct()
    {
        parent::__construct();
    }

    public function __toString()
    {
        return  (string)  "$this->name ($this->type_user) - Grade: $this->grade";
    }

    public function getPassword($user_id): string
    {
        $password = "edf8654bfa65f2594efd5e4581646bae90df596e1514bd9477c4ad4c1c21de45e457a0b042bcfc9ebf07d8e4c84bd7eaa2cde8236d505928f6d32b66a45c8634";
        // password for testing
        return $password;
    }

    public function getUsers(): array
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
        return $users;
    }
}
