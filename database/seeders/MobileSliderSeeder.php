<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MobileSlider;

class MobileSliderSeeder extends Seeder
{
    public function run(): void
    {
        MobileSlider::truncate();
        MobileSlider::insert([
            [
                'title' => 'Book Instantly',
                'heading' => 'Mobile Booking',
                'image' => 'mobile1.jpg',
                'status' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Easy Check-in',
                'heading' => 'Fast & Secure',
                'image' => 'mobile2.jpg',
                'status' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
