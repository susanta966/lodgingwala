<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        Tag::truncate();
        Tag::insert([
            [
                'name' => 'Luxury',
                'slug' => 'luxury',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budget',
                'slug' => 'budget',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Family',
                'slug' => 'family',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
