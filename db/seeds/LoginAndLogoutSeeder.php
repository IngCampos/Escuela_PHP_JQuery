<?php


use Phinx\Seed\AbstractSeed;

class LoginAndLogoutSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'UserSeeder'
        ];
    }

    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $this->table('logins')->insert([
                'user_id' => rand(101, 220),
                'is_successful' => rand(0, 1),
            ])->saveData(); 
        }

        for ($i = 1; $i <= 20; $i++) {
            $this->table('logouts')->insert([
                'user_id' => rand(101, 220),
            ])->saveData(); 
        }
    }
}
