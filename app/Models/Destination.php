<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destination extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'location',
        'category',
        'featured_image',
        'images',
        'highlights',
        'best_time_to_visit',
        'how_to_reach',
        'tips',
        'latitude',
        'longitude',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'images' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    /**
     * Get the user that owns the destination.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include published destinations.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
