<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Home;

class HomeSeeder extends Seeder
{
    public function run(): void
    {
        Home::truncate();
        Home::create([
            'modal_heading' => 'Welcome to Lodgingwala',
        ]);
    }
}
