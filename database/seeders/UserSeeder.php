<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'User', 
                'email' => 'user@gmail.com', 
                'password' => bcrypt('sousa1234'),
                'role' => 'user'
            ],
            [
                'name' => 'Instructor', 
                'email' => 'instructor@gmail.com', 
                'password' => bcrypt('sousa1234'),
                'role' => 'instructor'
            ],
        ];

        User::insert($users);
        
    }
}
