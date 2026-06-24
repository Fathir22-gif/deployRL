<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // User biasa
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'role' => 'user',
                'password' => Hash::make('user123'),
                'email_verified_at' => now(),
            ]
        );
    }
}