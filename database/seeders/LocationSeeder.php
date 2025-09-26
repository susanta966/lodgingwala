<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        Location::truncate();
        Location::insert([
            [
                'name' => 'Airport',
                'image' => 'airport.jpg',
                'distance' => '10km',
                'time' => '20min',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Railway Station',
                'image' => 'railway.jpg',
                'distance' => '5km',
                'time' => '10min',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
