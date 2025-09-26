<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class RecentPostSeeder extends Seeder
{
    public function run(): void
    {
        // Assuming BlogSeeder already inserts demo posts, but we add more for 'recent' effect
        Blog::insert([
            [
                'title' => 'Grand Opening: New Banquet Hall',
                'slug' => 'grand-opening-banquet',
                'content' => 'We are excited to announce the grand opening of our new banquet hall at Lodgingwala.',
                'image' => 'banquet_opening.jpg',
                'status' => 1,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'title' => 'Top 5 Family Hotels in 2025',
                'slug' => 'top-5-family-hotels',
                'content' => 'Discover the best family-friendly hotels for your next vacation.',
                'image' => 'family_hotels.jpg',
                'status' => 1,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
        ]);
    }
}
