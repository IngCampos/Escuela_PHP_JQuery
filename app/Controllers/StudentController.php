<?php

namespace App\Controllers;

class StudentController extends BaseController
{
    public function index()
    {
        $classes = [
            [
                "hour" => "08:00",
                "subject" => "Mathematics",
                "grade" => "5",
                "teacher" => "Martin",
                "attendances" => [
                    "assistance" => 2,
                    "abscence" => 1,
                    "exculpatory" => 1,
                    "delay" => 0,
                ]
            ],
            [
                "hour" => "08:00",
                "subject" => "Science",
                "grade" => "5",
                "teacher" => "Campos",
                "attendances" => [
                    "assistance" => 3,
                    "abscence" => 0,
                    "exculpatory" => 1,
                    "delay" => 0,
                ]
            ],
        ];

        return $this->renderHTML('student.twig', [
            'classes' => $classes,
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }
}
