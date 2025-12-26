<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::truncate();

        // Buat user admin contoh
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@demo.app',
            'password' => Hash::make('password123'), // Password di-hash
        ]);

        // Bisa ditambahkan user lain di sini
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@demo.app',
            'password' => Hash::make('rahasia456'),
        ]);

        $this->command->info('Sample user created successfully!');
    }
}
