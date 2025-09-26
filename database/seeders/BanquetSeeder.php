<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banquet;

class BanquetSeeder extends Seeder
{
    public function run(): void
    {
        Banquet::truncate();
        Banquet::insert([
            [
                'name' => 'Grand Banquet Hall',
                'slug' => 'grand-banquet-hall',
                'image' => 'banquet1.jpg',
                'person' => '200',
                'status' => 1,
                'priority' => 1,
                'amenities_id' => json_encode([1,2]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Royal Banquet',
                'slug' => 'royal-banquet',
                'image' => 'banquet2.jpg',
                'person' => '150',
                'status' => 1,
                'priority' => 2,
                'amenities_id' => json_encode([2,3]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
