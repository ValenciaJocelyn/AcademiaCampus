<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShuttleRoute;

class ShuttleRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShuttleRoute::create([
            'route' => 'Callaghan Campus',
            'order' => 'Marketown,Student Accommodation 1,Chancellery,Science,Maths,Design,Student Accommodation'
        ]);

        ShuttleRoute::create([
            'route' => 'Newcastle City',
            'order' => 'Marketown,University House,Q Building'
        ]);

        ShuttleRoute::create([
            'route' => 'Kemanggisan - Alam Sutera',
            'order' => 'Kemanggisan,Alam Sutera'
        ]);

        ShuttleRoute::create([
            'route' => 'Alam Sutera - Kemanggisan',
            'order' => 'Alam Sutera,Kemanggisan'
        ]);

        ShuttleRoute::create([
            'route' => 'Kemanggisan - Bekasi',
            'order' => 'Kemanggisan,Bekasi'
        ]);

        ShuttleRoute::create([
            'route' => 'Bekasi - Kemanggisan',
            'order' => 'Bekasi,Kemanggisan'
        ]);
    }
}
