<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Amenitie;

class AmenitieSeeder extends Seeder
{
    public function run(): void
    {
        Amenitie::truncate();
        Amenitie::insert([
            [
                'name' => 'Free WiFi',
                'icon' => 'wifi.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parking',
                'icon' => 'parking.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Air Conditioning',
                'icon' => 'ac.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
