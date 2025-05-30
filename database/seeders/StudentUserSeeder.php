<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Syahira',
            'username' => 'syahira',
            'email' => 'syahira@gmail.com',
            'no_hp' => '081122223333',
            'password' => Hash::make('12345678'),
            'role' => 'student',
        ]);
    }
}
