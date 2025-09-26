<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'logo',
        'favicon',
        'ftlogo',
        'address',
        'email',
        'phone',
        'whatsapp',
        'instagram',
        'twitter',
        'facebook',
        'og_type',
        'og_title',
        'og_description',
        'og_url',
        'og_site_name',
        'og_image',
        'og_width',
        'og_height',
        'twitter_card',
        'twitter_title',
        'twitter_image',
        'site_about',
        'site_location',
    ];
}
