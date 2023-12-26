<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'Admin',
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'role' => 'User',
        ]);
        User::create([
            'name' => 'David',
            'email' => 'david@gmail.com',
            'password' => bcrypt('david123'),
            'role' => 'User',
        ]);
        User::create([
            'name' => 'Tom',
            'email' => 'tom@gmail.com',
            'password' => bcrypt('tom123'),
            'role' => 'User',
        ]);
    }
}
