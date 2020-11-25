<?php

namespace App\Controllers;

use App\Models\User;

class StudentController extends BaseController
{
    public function index()
    {
        $classes = new User();

        return $this->renderHTML('student.twig', [
            'classes' => $classes->getClassesStudent(101),
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }
}
