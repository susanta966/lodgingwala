<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
     protected $fillable = [
        'name', 'service', 'email', 'phone', 'message', 'check_in', 'check_out', 'subject'
    ];
}
