<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::truncate();
        Testimonial::insert([
            [
                'link' => 'https://example.com/testimonial1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link' => 'https://example.com/testimonial2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
