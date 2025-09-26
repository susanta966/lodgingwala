<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::truncate();
        Room::insert([
            [
                'name' => 'Deluxe Room',
                'title' => 'Deluxe Room',
                'slug' => 'deluxe-room',
                'area' => '350 sq ft',
                'short_description' => 'Spacious room with king bed.',
                'star' => 5,
                'price' => 120.00,
                'timing' => '24/7',
                'images' => 'room1.jpg',
                'room_description_heading' => 'Deluxe Comfort',
                'room_description' => 'Enjoy a luxurious stay in our deluxe room.',
                'amenites_heading' => 'Room Amenities',
                'amenites_id' => json_encode([1,2]),
                'house_rule' => 'No smoking.',
                'cancellation_rule' => 'Free cancellation within 24 hours.',
                'status' => 1,
                'best_room' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suite',
                'title' => 'Suite',
                'slug' => 'suite',
                'area' => '500 sq ft',
                'short_description' => 'Luxury suite with living area.',
                'star' => 5,
                'price' => 200.00,
                'timing' => '24/7',
                'images' => 'room2.jpg',
                'room_description_heading' => 'Suite Luxury',
                'room_description' => 'Experience the best in our suite.',
                'amenites_heading' => 'Suite Amenities',
                'amenites_id' => json_encode([1,2,3]),
                'house_rule' => 'No pets.',
                'cancellation_rule' => 'Free cancellation within 24 hours.',
                'status' => 1,
                'best_room' => 0,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
