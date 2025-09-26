<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        Blog::truncate();
        Blog::insert([
            [
                'title' => 'Top 5 Travel Tips',
                'slug' => 'top-5-travel-tips',
                'description' => 'Discover the best travel tips for your next trip.',
                'images' => 'blog1.jpg',
                'author' => 'Admin',
                'author_image' => 'author1.jpg',
                'publish_date' => now(),
                'status' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Luxury Hotel Amenities',
                'slug' => 'luxury-hotel-amenities',
                'description' => 'Explore the amenities that make your stay special.',
                'images' => 'blog2.jpg',
                'author' => 'Admin',
                'author_image' => 'author2.jpg',
                'publish_date' => now(),
                'status' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
