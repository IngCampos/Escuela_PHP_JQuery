<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateClassRoomsAndSubjectsTables extends AbstractMigration
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
        $this->table('subjects')
            ->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('description', 'string')
            ->addColumn('grade', 'integer', ['limit' => 1])
            ->create();

        $this->table('class_rooms')
            ->addColumn('subject_id', 'integer')
            ->addForeignKey('subject_id', 'subjects', 'id')
            ->addColumn('teacher_id', 'integer')
            ->addForeignKey('teacher_id', 'users', 'id')
            ->addColumn('hour', 'smallinteger', ['limit' => 2])
            ->create();
    }
}
