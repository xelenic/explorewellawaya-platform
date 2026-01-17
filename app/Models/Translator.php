<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translator extends Model
{
    protected $fillable = [
        'name',
        'address',
        'language_skills',
        'work_experience',
        'contact_email',
        'contact_phone',
        'status',
    ];

    protected $casts = [
        'language_skills' => 'array',
    ];
}
