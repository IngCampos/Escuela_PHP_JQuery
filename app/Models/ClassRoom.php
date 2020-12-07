<?php

namespace App\Models;

class ClassRoom extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'class_rooms';
    }

    public function getClassRoomsTeacher($teacher_id)
    {
        $query =
            "SELECT class_rooms.id, subjects.name, subjects.grade, class_rooms.hour
            FROM $this->table 
        INNER JOIN subjects ON class_rooms.subject_id=subjects.id
        WHERE teacher_id = $teacher_id";
        $class = parent::get($query);
        
        return $class;
    }

    public function getClassTeacher($class_room_id, $teacher_id)
    {
        $class_room =
            "SELECT class_rooms.id, subjects.name, subjects.grade, class_rooms.hour, subjects.description
        FROM $this->table 
        INNER JOIN subjects ON class_rooms.subject_id=subjects.id
        WHERE teacher_id = $teacher_id and subject_id = $class_room_id";
        $data = parent::get($class_room)[0];

        $students =
            "SELECT users.name, users.id FROM users 
        INNER JOIN student_class_room ON student_class_room.student_id = users.id
        WHERE student_class_room.class_room_id = $class_room_id";
        $data['students'] = parent::get($students);

        foreach ($data['students'] as $key => $student) {
            $attendances =
                "SELECT type_attendance.name as name, COUNT(attendance.type_attendance_id) AS amount 
            FROM attendance 
            INNER JOIN type_attendance ON attendance.type_attendance_id = type_attendance.id  
            WHERE student_id = {$student['id']} and class_room_id = $class_room_id
            GROUP BY attendance.type_attendance_id";

            foreach (parent::get($attendances) as $attendance) {
                // data about attendance is processed to have format $key(type_attendance) = $value(amount)
                $data['students'][$key]['attendances'][strtolower($attendance['name'])] = $attendance['amount'];
            }
        }

        return $data;
    }
}
