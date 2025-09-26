<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            FacilitySeeder::class,
            SliderSeeder::class,
            BanquetSeeder::class,
            BlogSeeder::class,
            TestimonialSeeder::class,
            SiteSettingSeeder::class,
            HomeSeeder::class,
            AboutSeeder::class,
            LocationSeeder::class,
            RoomSeeder::class,
            MobileSliderSeeder::class,
        ]);
    }
}
