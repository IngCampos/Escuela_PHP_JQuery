<?php

namespace App\Controllers;

use App\Models\Classe;
use App\Models\Attendance;

class RoleCallController extends BaseController
{
    public function index()
    {
        $classes = new Classe();

        return $this->renderHTML('rolecall.twig', [
            'classes' => $classes->getClassesTeacher(11),
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }

    public function show()
    {
        $classe = new Classe();

        return $this->renderHTML('rolecall.show.twig', [
            'class' => $classe->getClassTeacher(1, 11),
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }

    public function create()
    {
        $classe = new Classe();
     
        return $this->renderHTML('rolecall.create.twig', [
            'class' => $classe->getClassTeacher(1, 11),
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
            $attendance = new Attendance();
            $class_id = 1; // testing
            // the date has '' because is a string
            $date = "'{$postData['date']}'";
            // the date is deleted to have just the attendance of each student
            unset($postData['date']);

            // if there are data whit the same class_id and date
            // the data is not stored
            $conditionals = [
                "class_id = $class_id",
                "date = $date"
            ];
            if (!empty($attendance->getWhere($conditionals)))
            return $this->renderHTML('rolecall.create.twig', [
                'errors' => ['There is the same date in the database.']
            ]);

            foreach ($postData as $key => $data) {
                // TODO: Optimize the code, here an array whit the same values are created
                $data = [
                    "class_id" => $class_id,
                    "student_id" => $key,
                    "date" => $date,
                    "type_attendance_id" => $data,
                ];
                $attendance->save($data);
            }

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
        $attendance = new Attendance();

        return $this->renderHTML('rolecall.show.edit.twig', [
            'class' => $attendance->getAttendance(1, 101),
            'login' => [
                "name" => "Martin"
            ]
        ]);
    }

    public function showUpdate($request)
    {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $attendance = new Attendance();
            $class_id = 1; // testing
            $student_id = 101; //testing

            foreach ($postData as $key => $data) {
                $updates = ["type_attendance_id = $data"];
                $conditionals = [
                    "class_id = $class_id",
                    "student_id = $student_id",
                    // date has '' because it is a String
                    "date = '$key'"
                ];
                $attendance->update($updates, $conditionals);
            }
            
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
