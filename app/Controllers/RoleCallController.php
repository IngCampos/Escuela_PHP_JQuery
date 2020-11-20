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
            'classes' => $classes->getClassesTeacher(1),
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
