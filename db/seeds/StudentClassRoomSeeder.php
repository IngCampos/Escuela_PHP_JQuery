<?php


use Phinx\Seed\AbstractSeed;

class StudentClassRoomSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'ClassRoomSeeder'
        ];
    }

    public function run()
    {
        $class_room_id = 1;
        for ($i = 0; $i < 6; $i++) {
            for ($student_id = 1; $student_id <= 20; $student_id++) {
                $this->table('student_class_room')->insert([
                    'student_id' => $student_id + (20 * $i) + 100,
                    'class_room_id' => $class_room_id,
                ])->saveData();

                $this->table('student_class_room')->insert([
                    'student_id' => $student_id + (20 * $i) + 100,
                    'class_room_id' => ($class_room_id + 1),
                ])->saveData();
            }
            $class_room_id = $class_room_id + 2;
        }
    }
}
