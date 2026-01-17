<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'address',
        'restaurant_name',
        'registration_number',
        'location',
        'employees',
        'contact_email',
        'contact_phone',
        'status',
    ];
}
