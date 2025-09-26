<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::truncate();
        SiteSetting::create([
            'site_title' => 'Lodgingwala',
            'logo' => '1731733822.png', // Use a real file from public/admin/siteImage/logo/
            'favicon' => 'favicon.ico',
            'ftlogo' => '1731733822.png',
            'address' => '123 Main Street, City',
            'email' => 'info@lodgingwala.com',
            'phone' => '1234567890',
            'whatsapp' => '1234567890',
            'instagram' => 'https://instagram.com/lodgingwala',
            'twitter' => 'https://twitter.com/lodgingwala',
            'facebook' => 'https://facebook.com/lodgingwala',
            'og_type' => 'website',
            'og_title' => 'Lodgingwala',
            'og_description' => 'Best hotel in town',
            'og_url' => 'https://lodgingwala.com',
            'og_site_name' => 'Lodgingwala',
            'og_image' => 'ogimage.png',
            'og_width' => '1200',
            'og_height' => '630',
            'twitter_card' => 'summary_large_image',
            'twitter_title' => 'Lodgingwala',
            'twitter_image' => 'twitterimage.png',
            'site_about' => 'Welcome to Lodgingwala, your best stay.',
            'site_location' => 'City Center',
        ]);
    }
}
