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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'username' => 'admin',
            'role' => 'admin',
            'password' => 'bcrypt("12345678")'
        ]);
        User::create([
            'name' => 'Ibnu Alif Muhadzdzib',
            'email' => 'ibnualdbest@gmail.com',
            'username' => 'IbnuMuhadzdzib',
            'role' => 'user',
            'password' => 'bcrypt("12345678")'
        ]);
    }
}
