<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateAttendanceAndTypeAttendanceTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table('type_attendance')
            ->addColumn('name', 'string', ['limit' => 25])
            ->create();

        $this->table('attendance')
            ->addColumn('class_room_id', 'integer')
            ->addForeignKey('class_room_id', 'class_rooms', 'id')
            ->addColumn('student_id', 'integer')
            ->addForeignKey('student_id', 'users', 'id')
            ->addColumn('type_attendance_id', 'integer')
            ->addForeignKey('type_attendance_id', 'type_attendance', 'id')
            ->addColumn('date', 'date')
            ->create();

        if ($this->isMigratingUp()) {
            $this->table('type_attendance')->insert(
                [
                    ['name' => 'Assistance'],
                    ['name' => 'Absence'],
                    ['name' => 'Exculpatory'],
                    ['name' => 'Delay']
                ]
            )->save();
        }
    }
}
