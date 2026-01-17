<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelAgency extends Model
{
    protected $fillable = [
        'name',
        'address',
        'registration_number',
        'vehicles',
        'contact_email',
        'contact_phone',
        'status',
    ];

    protected $casts = [
        'vehicles' => 'array',
    ];
}
