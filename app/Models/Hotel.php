<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'address',
        'hotel_type',
        'room_qty',
        'ac_available',
        'bar_available',
        'swimming_pool_available',
        'tourist_board_approved',
        'location',
        'images',
        'contact_email',
        'contact_phone',
        'status',
    ];

    protected $casts = [
        'ac_available' => 'boolean',
        'bar_available' => 'boolean',
        'swimming_pool_available' => 'boolean',
        'tourist_board_approved' => 'boolean',
        'images' => 'array',
    ];
}
