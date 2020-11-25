<?php

namespace App\Models;

class Attendance extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'attendance';
    }

    public function getAttendance($class_id, $student_id)
    {
        $class =
            "SELECT class.id, subjects.name, subjects.grade, class.hour, subjects.description
        FROM class 
        INNER JOIN subjects ON class.subject_id=subjects.id
        WHERE class.id = $class_id";
        $data = parent::get($class)[0];

        $student =
            "SELECT id, name FROM users 
        WHERE id = $student_id";
        $data['student'] = parent::get($student)[0];

        $attendances =
            "SELECT date, type_attendance_id FROM $this->table 
        WHERE student_id = $student_id and class_id = $class_id";
        $data['student']['attendances'] = parent::get($attendances);

        return $data;
    }
}
