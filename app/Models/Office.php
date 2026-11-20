<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'google_map',
        'order',
        'status',
    ];

    protected $appends = ['map_link'];

    /**
     * Get direct Google Maps link or fallback query link
     */
    public function getMapLinkAttribute(): string
    {
        $map = trim($this->google_map ?? '');

        if (!$map) {
            $query = ($this->name ? $this->name . ', ' : '') . ($this->address ?? 'Nepal');
            return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($query);
        }

        // If user pasted an iframe embed code
        if (preg_match('/src=["\']([^"\']+)["\']/', $map, $matches)) {
            return $matches[1];
        }

        // If it's already a full URL (maps.app.goo.gl or google.com/maps...)
        if (str_starts_with($map, 'http://') || str_starts_with($map, 'https://')) {
            return $map;
        }

        // If user entered coordinates (e.g. 27.6833, 85.3167) or address text
        return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($map);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
