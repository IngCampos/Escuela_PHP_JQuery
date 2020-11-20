<?php

namespace App\Models;

class Attendance extends Base
{
    private $table = 'attendance';

    function __construct()
    {
        parent::__construct();
    }

    public function getAttendance($class_id, $student_id): array
    {
        $attendance = [
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

        return $attendance;
    }
}
