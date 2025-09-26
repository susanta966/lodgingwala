<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::truncate();
        About::create([
            'title' => 'About Lodgingwala',
            'heading' => 'Your Comfort, Our Priority',
            'description' => 'Lodgingwala is dedicated to providing the best hospitality experience.',
            'image' => 'about.jpg',
            'year_of_exprience' => '10',
            'year_of_exprience_title' => 'Years of Excellence',
            'testimonials_word' => 'Testimonials',
            'testimonials_heading' => 'What Our Guests Say',
            'testimonials_short_description' => 'Read our guest reviews.',
            'facilties_word' => 'Facilities',
            'facilties_heading' => 'Our Facilities',
            'facilties_short_description' => 'Enjoy our top-notch amenities.',
        ]);
    }
}
