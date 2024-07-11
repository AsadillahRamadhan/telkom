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
            'username' => 'Admin',
            'role' => 'admin',
            'password' => 'admin'
        ]);

        User::create([
            'username' => 'User',
            'role' => 'user',
            'password' => 'user'
        ]);
    }
}
