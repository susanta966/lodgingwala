<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        Slider::truncate();
        Slider::insert([
            [
                'title' => 'Welcome to Lodgingwala',
                'heading' => 'Best Stay Experience',
                'image' => 'slider1.jpg',
                'status' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Luxury Rooms',
                'heading' => 'Comfort & Style',
                'image' => 'slider2.jpg',
                'status' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
