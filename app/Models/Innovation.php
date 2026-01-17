<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Innovation extends Model
{
    protected $fillable = [
        'name',
        'address',
        'innovation_type',
        'best_achievements',
        'contact_email',
        'contact_phone',
        'status',
    ];
}
