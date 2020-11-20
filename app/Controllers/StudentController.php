<?php

namespace App\Controllers;

use App\Models\Classe;

class StudentController extends BaseController
{
    public function index()
    {
        $classes = new Classe();

        return $this->renderHTML('student.twig', [
            'classes' => $classes->getClassesStudent(101),
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }
}
