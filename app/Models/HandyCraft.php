<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HandyCraft extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'business_registration_number',
        'items',
        'contact_email',
        'contact_phone',
        'status',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
