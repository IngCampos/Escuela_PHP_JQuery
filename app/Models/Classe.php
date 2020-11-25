<?php

namespace App\Models;

class Classe extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'class';
    }

    public function getClassesTeacher($teacher_id)
    {
        $query =
            "SELECT class.id, subjects.name, subjects.grade, class.hour
            FROM $this->table 
        INNER JOIN subjects ON class.subject_id=subjects.id
        WHERE teacher_id = $teacher_id";
        $classes = parent::get($query);
        
        return $classes;
    }

    public function getClassTeacher($class_id, $teacher_id)
    {
        $class =
            "SELECT class.id, subjects.name, subjects.grade, class.hour, subjects.description
        FROM $this->table 
        INNER JOIN subjects ON class.subject_id=subjects.id
        WHERE teacher_id = $teacher_id and subject_id = $class_id";
        $data = parent::get($class)[0];

        $students =
            "SELECT users.name, users.id FROM users 
        INNER JOIN student_class ON student_class.student_id = users.id
        WHERE student_class.class_id = $class_id";
        $data['students'] = parent::get($students);

        foreach ($data['students'] as $key => $student) {
            $attendances =
                "SELECT type_attendance.description as name, COUNT(attendance.type_attendance_id) AS amount 
            FROM attendance 
            INNER JOIN type_attendance ON attendance.type_attendance_id = type_attendance.id  
            WHERE student_id = {$student['id']} and class_id = $class_id
            GROUP BY attendance.type_attendance_id";

            foreach (parent::get($attendances) as $attendance) {
                // data about attendance is processed to have format $key(type_attendance) = $value(amount)
                $data['students'][$key]['attendances'][strtolower($attendance['name'])] = $attendance['amount'];
            }
        }

        return $data;
    }
}
