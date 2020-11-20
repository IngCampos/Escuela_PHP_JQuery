<?php

namespace App\Models;

class Classe extends Base
{
    private $table = 'class';

    function __construct()
    {
        parent::__construct();
    }

    public function getClassesStudent($student_id): array
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
        return $classes;
    }

    public function getClassesTeacher($teacher_id): array
    {
        $classes = [
            [
                "id" => 1,
                "name" => "Mathematics",
                "grade" => 5,
                "hour" => '08:00',
            ],
            [
                "id" => 1,
                "name" => "Science",
                "grade" => 5,
                "hour" => '09:00',
            ]
        ];
        return $classes;
    }

    public function getClassTeacher($teacher_id, $class_id): array
    {
        $class = [
            "id" => 1,
            "name" => "Mathematics",
            "grade" => 5,
            "hour" => '08:00',
            "description" => 'description',
            "students" => [
                [
                    "id" => 1,
                    "name" => "Martin",
                    "attendances" => [
                        "assistance" => 2,
                        "abscence" => 1,
                        "exculpatory" => 1,
                        "delay" => 0,
                    ]
                ],
                [
                    "id" => 2,
                    "name" => "Campos",
                    "attendances" => [
                        "assistance" => 3,
                        "abscence" => 0,
                        "exculpatory" => 0,
                        "delay" => 1,
                    ]
                ]
            ]
        ];
        return $class;
    }
}
