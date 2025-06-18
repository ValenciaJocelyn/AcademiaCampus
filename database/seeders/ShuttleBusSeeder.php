<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShuttleBus;

class ShuttleBusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShuttleBus::create([
            'plate_number' => 'B 1234 XYZ',
            'bus_type' => 'Campus',
            'route_id' => 1
        ]);

        ShuttleBus::create([
            'plate_number' => 'B 5678 ABC',
            'bus_type' => 'Inter-campus',
            'route_id' => 2
        ]);
    }
}
