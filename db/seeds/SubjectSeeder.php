<?php


use Phinx\Seed\AbstractSeed;

class SubjectSeeder extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($subject = 1; $subject <= 12; $subject++) {
            $this->table('subjects')->insert([
                'id' => $subject,
                'name' => $faker->colorName . " " . $faker->colorName,
                'description' => $faker->text($maxNbChars = 40),
                'grade' => 2,
            ])->saveData();
        }
    }
}
