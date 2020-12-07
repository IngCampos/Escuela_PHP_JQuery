<?php


use Phinx\Seed\AbstractSeed;

class ClassRoomSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'SubjectSeeder',
            'UserSeeder',
        ];
    }
    public function run()
    {
        $teacher_id = 10;
        $subject_id = 0;
        for ($i = 1; $i <= 6; $i++) {
            $teacher_id++;
            $subject_id++;
            $this->table('class_rooms')->insert([
                'subject_id' => $subject_id,
                'teacher_id' => $teacher_id,
                'hour' => 7,
            ])->saveData();

            $subject_id++;
            $this->table('class_rooms')->insert([
                'subject_id' => $subject_id,
                'teacher_id' => $teacher_id,
                'hour' => 8,
            ])->saveData();
        }
    }
}
