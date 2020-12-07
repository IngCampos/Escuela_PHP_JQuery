<?php


use Phinx\Seed\AbstractSeed;

class AttendanceSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'StudentClassRoomSeeder'
        ];
    }
    public function run()
    {
        // It just fills students from two class rooms
        for ($i = 1; $i <= 20; $i++) {
            $this->table('attendance')->insert([
                'class_room_id' => 1,
                'student_id' => $i + 100,
                'date' => '2020-11-29',
                'type_attendance_id' => rand(1, 4)
            ])->saveData();

            $this->table('attendance')->insert([
                'class_room_id' => 1,
                'student_id' => $i + 100,
                'date' => '2020-11-30',
                'type_attendance_id' => rand(1, 4)
            ])->saveData();

            $this->table('attendance')->insert([
                'class_room_id' => 2,
                'student_id' => $i + 100,
                'date' => '2020-11-29',
                'type_attendance_id' => rand(1, 4)
            ])->saveData();

            $this->table('attendance')->insert([
                'class_room_id' => 2,
                'student_id' => $i + 100,
                'date' => '2020-11-30',
                'type_attendance_id' => rand(1, 4)
            ])->saveData();
        }
    }
}
