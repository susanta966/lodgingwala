<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        Facility::truncate();
        Facility::insert([
            [
                'name' => 'Free WiFi',
                'icon' => 'wifi.png',
                'short_description' => 'High-speed wireless internet access.',
                'status' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Swimming Pool',
                'icon' => 'pool.png',
                'short_description' => 'Outdoor pool for relaxation.',
                'status' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parking',
                'icon' => 'parking.png',
                'short_description' => 'Secure parking for guests.',
                'status' => 1,
                'priority' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
