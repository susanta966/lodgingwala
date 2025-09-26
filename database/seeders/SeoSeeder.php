<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seo;

class SeoSeeder extends Seeder
{
    public function run(): void
    {
        Seo::truncate();
        Seo::insert([
            [
                'page' => 'home',
                'meta_title' => 'Lodgingwala - Best Hotels & Banquets',
                'meta_description' => 'Book top hotels, banquets, and more with Lodgingwala. Enjoy premium stays and event spaces.',
                'meta_keywords' => 'hotel, banquet, lodging, booking, events',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page' => 'about',
                'meta_title' => 'About Lodgingwala',
                'meta_description' => 'Learn more about Lodgingwala, our mission, and our premium hospitality services.',
                'meta_keywords' => 'about, lodgingwala, hospitality',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
