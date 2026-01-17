<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'gender',
        'licence_number',
        'work_experience',
        'special_achievements',
        'language_skills',
        'approved_locations',
        'contact_email',
        'contact_phone',
        'status',
    ];

    protected $casts = [
        'language_skills' => 'array',
        'approved_locations' => 'array',
    ];
}
