<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsersAndTypeUserTables extends AbstractMigration
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
        $this->table('type_user')
            ->addColumn('name', 'string', ['limit' => 25])
            ->create();

        $this->table('users')
            ->addColumn('type_user_id', 'integer')
            ->addForeignKey('type_user_id', 'type_user', 'id')
            ->addColumn('name', 'string', ['limit' => 30])
            ->addColumn('grade', 'integer', ['limit' => 1])
            ->addColumn('password', 'string')
            ->create();

        if ($this->isMigratingUp()) {
            $this->table('type_user')->insert(
                [
                    ['name' => 'Administrator'],
                    ['name' => 'Teacher'],
                    ['name' => 'Student'],
                ]
            )->save();

            $this->table('users')->insert(
                [
                    'type_user_id' => 1,
                    'name' => 'Administrator',
                    'grade' => 0,
                    // school is the password by default
                    'password' => 'edf8654bfa65f2594efd5e4581646bae90df596e1514bd9477c4ad4c1c21de45e457a0b042bcfc9ebf07d8e4c84bd7eaa2cde8236d505928f6d32b66a45c8634',
                ]
            )->save();
        }
    }
}
