<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CulturedSector extends Model
{
    protected $fillable = [
        'name',
        'address',
        'institution_name',
        'type',
        'achievements',
        'contact_email',
        'contact_phone',
        'status',
    ];
}
