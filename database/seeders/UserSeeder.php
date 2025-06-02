<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'username' => 'ADM111',
                'email' => 'admin@gmail.com',
                'no_hp' => '081234567890',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Valencia Jocelyn',
                'username' => '2702247222',
                'email' => 'valencia.zhiang@binus.ac.id',
                'no_hp' => '0895618071073',
                'password' => Hash::make('student123'),
                'role' => 'student'
            ],
            [
                'name' => 'Super Lecturer',
                'username' => 'D1234',
                'email' => 'lecturer@binus.ac.id',
                'no_hp' => '081122223333',
                'password' => Hash::make('lecturer123'),
                'role' => 'lecturer'
            ],
            [
                'name' => 'Super Driver',
                'username' => 'DV123',
                'email' => 'driver@gmail.com',
                'no_hp' => '081212341234',
                'password' => Hash::make('driver123'),
                'role' => 'driver'
            ]
        ]);
    }
}
