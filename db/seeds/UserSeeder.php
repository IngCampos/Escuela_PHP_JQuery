<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    // TODO: create the logic to allow run seeders again without errors
    public function run()
    {
        $faker =Faker\Factory::create();
        for ($teacher = 11; $teacher <= 16; $teacher++) {
            $this->table('users')->insert([
                'id' => $teacher,
                'type_user_id' => 2,
                'name' => "{$faker->title} {$faker->firstName} {$faker->lastName}",
                'grade' => 2,
                // school is the password by default
                'password' => 'edf8654bfa65f2594efd5e4581646bae90df596e1514bd9477c4ad4c1c21de45e457a0b042bcfc9ebf07d8e4c84bd7eaa2cde8236d505928f6d32b66a45c8634'
            ])->saveData();
        }

        for ($student = 101; $student <= 220; $student++) {
            $this->table('users')->insert([
                'id' => $student,
                'type_user_id' => 3,
                'name' => "{$faker->firstName} {$faker->lastName}",
                'grade' => 2,
                'password' => 'edf8654bfa65f2594efd5e4581646bae90df596e1514bd9477c4ad4c1c21de45e457a0b042bcfc9ebf07d8e4c84bd7eaa2cde8236d505928f6d32b66a45c8634'
            ])->saveData();
        }
    }
}
