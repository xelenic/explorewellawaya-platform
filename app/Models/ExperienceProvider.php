<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceProvider extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'registration_number',
        'types_of_experience',
        'work_experience',
        'contact_email',
        'contact_phone',
        'status',
    ];

    protected $casts = [
        'types_of_experience' => 'array',
    ];
}
