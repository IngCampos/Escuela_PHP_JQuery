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

    public function GetClassesStudent($student_id)
    {
        $classes =
            "SELECT class.id, class.hour, subjects.name, subjects.grade, users.name as teacher
        FROM class 
        INNER JOIN subjects ON class.subject_id = subjects.id 
        INNER JOIN student_class ON student_class.class_id = class.id
        INNER JOIN users ON class.teacher_id = users.id
        WHERE student_class.student_id = $student_id";
        $data = parent::get($classes);

        foreach ($data as $key => $class) {
            $attendances =
                "SELECT type_attendance.description as name, COUNT(attendance.type_attendance_id) AS amount 
            FROM attendance 
            INNER JOIN type_attendance ON attendance.type_attendance_id = type_attendance.id  
            WHERE student_id = $student_id and class_id = {$class['id']}
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
