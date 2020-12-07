<?php

namespace App\Models;

class User extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }

    public function __toString()
    {
        return  (string)  "$this->name ($this->type_user) - Grade: $this->grade";
    }

    public function GetClassRoomsStudent($student_id)
    {
        $classes =
            "SELECT class_rooms.id, class_rooms.hour, subjects.name, subjects.grade, users.name as teacher
        FROM class_rooms
        INNER JOIN subjects ON class_rooms.subject_id = subjects.id 
        INNER JOIN student_class_room ON student_class_room.class_room_id = class_rooms.id
        INNER JOIN users ON class_rooms.teacher_id = users.id
        WHERE student_class_room.student_id = $student_id";
        $data = parent::get($classes);

        foreach ($data as $key => $class) {
            $attendances =
                "SELECT type_attendance.name as name, COUNT(attendance.type_attendance_id) AS amount 
            FROM attendance 
            INNER JOIN type_attendance ON attendance.type_attendance_id = type_attendance.id  
            WHERE student_id = $student_id and class_room_id = {$class['id']}
            GROUP BY attendance.type_attendance_id";

            $total = 0;
            foreach (parent::get($attendances) as $attendance) {
                // data about attendance is processed to have format $key(type_attendance) = $value(amount)
                $data[$key]['attendances'][strtolower($attendance['name'])] = $attendance['amount'];
                $total += $attendance['amount'];
            }
            $data[$key]['attendances']['total'] = $total;
        }

        return $data;
    }
}
