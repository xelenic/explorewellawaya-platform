<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PassengerTransport extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'vehicle_type',
        'registration_number',
        'contact_email',
        'contact_phone',
        'status',
    ];
}
