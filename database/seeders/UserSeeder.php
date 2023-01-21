<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            
            [
                'username' => 'test',
                'name' => 'test',
                'email' => 'test@gmal.com',
                'password' => bcrypt('test123'),
                'login_attempt' => 1,
                'language' => 'en',
                'is_blocked' => 1,
                'has_agreed_with_terms_and_condition' => 1
            ],
            [
                'username' => 'test1',
                'name' => 'test1',
                'email' => 'test1@gmail.com',
                'password' => bcrypt('test123'),
                'login_attempt' => 1,
                'language' => 'en',
                'is_blocked' => 1,
                'has_agreed_with_terms_and_condition' => 1
            ],
        ];

        User::insert($data);

    }
}
