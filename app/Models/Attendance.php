<?php

namespace App\Models;

class Attendance extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'attendance';
    }

    public function getAttendance($class_room_id, $student_id)
    {
        $class_room =
            "SELECT class_rooms.id, subjects.name, subjects.grade, class_rooms.hour, subjects.description
        FROM class_rooms
        INNER JOIN subjects ON class_rooms.subject_id=subjects.id
        WHERE class_rooms.id = $class_room_id";
        $data = parent::get($class_room)[0];

        $student =
            "SELECT id, name FROM users 
        WHERE id = $student_id";
        $data['student'] = parent::get($student)[0];

        $attendances =
            "SELECT date, type_attendance_id FROM $this->table 
        WHERE student_id = $student_id and class_room_id = $class_room_id";
        $data['student']['attendances'] = parent::get($attendances);
        
        return $data;
    }
}
