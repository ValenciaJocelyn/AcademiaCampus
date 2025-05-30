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
            'name' => 'Valencia Jocelyn',
            'username' => '2702247222',
            'email' => 'valencia.zhiang@binus.ac.id',
            'no_hp' => '0895618071073',
            'password' => Hash::make('12345678'),
            'role' => 'student',
        ]);
    }
}
