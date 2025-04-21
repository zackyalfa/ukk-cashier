<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'adminpusat@example.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);

        User::create([
            'name' => 'zac',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
