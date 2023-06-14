<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {

        $user = new UserModel;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $user->save(
                [
                    'first_name'        =>    $faker->name,
                    'last_name'        =>    $faker->name,
                    'email'       =>    $faker->email,
                    'password'    =>    password_hash($faker->password, PASSWORD_DEFAULT),
                    'mobile'       =>    $faker->phoneNumber,
                    'username'     =>    $faker->userName,
                    'created_at'  =>    Time::createFromTimestamp($faker->unixTime()),
                    'updated_at'  =>    Time::now()
                ]
            );
        }
    }
}
