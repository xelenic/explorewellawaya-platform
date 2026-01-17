<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMediaActivist extends Model
{
    protected $fillable = [
        'name',
        'address',
        'page_names',
        'links',
        'contact_email',
        'contact_phone',
        'status',
    ];

    protected $casts = [
        'page_names' => 'array',
        'links' => 'array',
    ];
}
