<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShuttleStatus;

class ShuttleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShuttleStatus::create([
            'shuttle_id' => 1,
            'current_stop' => 'Chancellery',
            'next_stop' => 'Science',
        ]);

        ShuttleStatus::create([
            'shuttle_id' => 1,
            'current_stop' => 'Design',
            'next_stop' => 'Student Accommodation',
        ]);
    }
}
