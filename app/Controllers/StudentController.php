<?php

namespace App\Controllers;

use App\Models\User;

class StudentController extends BaseController
{
    public function index()
    {
        if ($_SESSION['userType'] != 3)
            // if the user is not a student
            return $this->redirectTypeUser($_SESSION['userType']);

        $classes = new User();
        return $this->renderHTML('student.twig', [
            'classes' => $classes->getClassesStudent($_SESSION['userId']),
            'login' => [
                "name" => $_SESSION['userName']
            ]
        ]);
    }
}
