<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'gallery_id',
        'name',
        'category',
        'caption',
        'location',
        'image',
        'order',
        'status',
    ];

    protected $appends = ['url_image'];

    /**
     * Resolve the public URL for a gallery image.
     * Handles three storage patterns:
     *   1. Full URL (http/https) → use as-is
     *   2. assets/ prefix → asset() helper (served from project root)
     *   3. Bare filename → stored under storage/uploads/gallery/{folder}/{filename}
     *      accessible at APP_URL/storage/uploads/gallery/{folder}/{filename}
     */
    public function getUrlImageAttribute(): string
    {
        $img = $this->image ?? '';

        if (!$img) {
            return asset('assets/images/farms/nepal-terrace-farm.jpg');
        }

        if (str_starts_with($img, 'http')) {
            return $img;
        }

        if (str_starts_with($img, 'assets/')) {
            return asset($img);
        }

        // Bare filename stored via admin → storage/uploads/gallery/{folder}/{file}
        $folder = $this->gallery ? $this->gallery->folder : 'harvest';
        return asset('storage/uploads/gallery/' . $folder . '/' . $img);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }
}
