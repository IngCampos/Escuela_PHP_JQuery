<?php

namespace App\Controllers;

class RoleCallController extends BaseController
{
    public function index()
    {
        $classesTeacher = [
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

        return $this->renderHTML('rolecall.twig', [
            'classes' => $classesTeacher,
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }

    public function show()
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

        return $this->renderHTML('rolecall.show.twig', [
            'class' => $class,
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }

    public function create()
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
                    "name" => "Martin"
                ],
                [
                    "id" => 2,
                    "name" => "Campos"
                ]
            ]
        ];

        return $this->renderHTML('rolecall.create.twig', [
            'class' => $class,
            'current_date' => date('Y') . '-' . date('m') . '-' . date('d'),
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }

    public function store($request)
    {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $storeSuccessful = true;
            if ($storeSuccessful) {
                header("Location: /rolecall/show/1");
                die();
            }
        }
        return $this->renderHTML('rolecall.create.twig', [
            'errors' => ['Data not stored.']
        ]);
    }

    public function showEdit()
    {
        $class = [
            "id" => 1,
            "name" => "Mathematics",
            "grade" => 5,
            "hour" => '08:00',
            "description" => 'description',
            "student" => [
                "id" => 1,
                "name" => "Martin",
                "attendances" => [
                    [
                        "date" => '2020-11-16',
                        "type_attendance_id" => 1
                    ],
                    [
                        "date" => '2020-11-17',
                        "type_attendance_id" => 2
                    ],
                    [
                        "date" => '2020-11-18',
                        "type_attendance_id" => 2
                    ],
                    [
                        "date" => '2020-11-19',
                        "type_attendance_id" => 1
                    ],
                ]
            ]
        ];

        return $this->renderHTML('rolecall.show.edit.twig', [
            'class' => $class,
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }

    public function showUpdate($request)
    {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $updateSuccessful = true;
            if ($updateSuccessful) {
                header("Location: /rolecall/show/1");
                die();
            }
        }
        return $this->renderHTML('rolecall.show.edit.twig', [
            'errors' => ['Data not updated.']
        ]);
    }
}
