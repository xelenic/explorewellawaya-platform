<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MassMedia extends Model
{
    protected $fillable = [
        'name',
        'address',
        'types',
        'registration_number',
        'contact_email',
        'contact_phone',
        'status',
    ];

    protected $casts = [
        'types' => 'array',
    ];
}
