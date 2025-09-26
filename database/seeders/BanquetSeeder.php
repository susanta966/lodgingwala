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
                'image' => 'banquet1.jpg',
                'person' => '200',
                'status' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Royal Banquet',
                'image' => 'banquet2.jpg',
                'person' => '150',
                'status' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
