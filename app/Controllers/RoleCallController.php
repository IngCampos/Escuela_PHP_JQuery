<?php

namespace App\Controllers;

use App\Models\ClassRoom;
use App\Models\Attendance;
use Zend\Diactoros\Response\RedirectResponse;

class RoleCallController extends BaseController
{
    public function index()
    {
        // TODO: implement formal Middleware to not repeat code
        if ($_SESSION['userType'] != 2)
            // if the user is not a teacher
            return $this->redirectTypeUser($_SESSION['userType']);

        $classes = new ClassRoom();

        return $this->renderHTML('rolecall.twig', [
            'classes' => $classes->getClassRoomsTeacher($_SESSION['userId']),
            'login' => [
                "name" => $_SESSION['userName']
            ]
        ]);
    }

    public function show($request)
    {
        // TODO: Implement security if the teacher access to a class that does not belong him/her
        if ($_SESSION['userType'] != 2)
            // if the user is not a teacher
            return $this->redirectTypeUser($_SESSION['userType']);
        
        $classe = new ClassRoom();

        return $this->renderHTML('rolecall.show.twig', [
            'class' => $classe->getClassTeacher($request->getAttribute('class_room_id'), $_SESSION['userId']),
            'login' => [
                "name" => $_SESSION['userName']
            ]
        ]);
    }

    public function create($request)
    {
        if ($_SESSION['userType'] != 2)
            // if the user is not a teacher
            return $this->redirectTypeUser($_SESSION['userType']);
        
        $class = new ClassRoom();
     
        return $this->renderHTML('rolecall.create.twig', [
            'class' => $class->getClassTeacher($request->getAttribute('class_room_id'), $_SESSION['userId']),
            // TODO: Validate if the current date is stored in the database
            'current_date' => date('Y') . '-' . date('m') . '-' . date('d'),
            'login' => [
                "name" => $_SESSION['userName']
            ]
        ]);
    }

    public function store($request)
    {
        if ($_SESSION['userType'] != 2)
            // if the user is not a teacher
            return $this->redirectTypeUser($_SESSION['userType']);

        $class_room_id = (int) $request->getAttribute('class_room_id'); 
        
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $attendance = new Attendance();
            // the date has '' because is a string
            $date = "'{$postData['date']}'";
            // the date is deleted to have just the attendance of each student
            unset($postData['date']);

            // if there are data whit the same class_room_id and date
            // the data is not stored
            $conditionals = [
                "class_room_id = $class_room_id",
                "date = $date"
            ];
            if (!empty($attendance->getWhere($conditionals)))
            return $this->renderHTML('rolecall.create.twig', [
                'errors' => ['There is the same date in the database.']
            ]);

            foreach ($postData as $key => $data) {
                // TODO: Optimize the code, here an array whit the same values are created
                $data = [
                    "class_room_id" => $class_room_id,
                    "student_id" => $key,
                    "date" => $date,
                    "type_attendance_id" => $data,
                ];
                $attendance->save($data);
            }

            $storeSuccessful = true;
            if ($storeSuccessful) {
                return new RedirectResponse("/rolecall/show/$class_room_id");
            }
        }
        return $this->renderHTML('rolecall.create.twig', [
            'errors' => ['Data not stored.']
        ]);
    }

    public function showEdit($request)
    {
        if ($_SESSION['userType'] != 2)
            // if the user is not a teacher
            return $this->redirectTypeUser($_SESSION['userType']);

        $attendance = new Attendance();

        return $this->renderHTML('rolecall.show.edit.twig', [
            'class' => $attendance->getAttendance(
                (int) $request->getAttribute('class_room_id'),
                (int) $request->getAttribute('student_id')
            ),
            'login' => [
                "name" => $_SESSION['userName']
            ]
        ]);
    }

    public function showUpdate($request)
    {
        if ($_SESSION['userType'] != 2)
            // if the user is not a teacher
            return $this->redirectTypeUser($_SESSION['userType']);
        
            if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $attendance = new Attendance();
            $class_room_id = (int) $request->getAttribute('class_room_id');
            $student_id = (int) $request->getAttribute('student_id');

            foreach ($postData as $key => $data) {
                $updates = ["type_attendance_id = $data"];
                $conditionals = [
                    "class_room_id = $class_room_id",
                    "student_id = $student_id",
                    // date has '' because it is a String
                    "date = '$key'"
                ];
                $attendance->update($updates, $conditionals);
            }
            
            $updateSuccessful = true;
            if ($updateSuccessful) {
                return new RedirectResponse("/rolecall/show/$class_room_id");
            }
        }
        return $this->renderHTML('rolecall.show.edit.twig', [
            'errors' => ['Data not updated.']
        ]);
    }
}
