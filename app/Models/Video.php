<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'nepali_title',
        'video_url',
        'duration',
        'image',
        'order',
        'status',
    ];

    protected $appends = ['url_image'];

    public function getUrlImageAttribute()
    {
        if (!$this->image) {
            return asset('assets/images/farms/tea-field.jpg');
        }
        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http')) {
            return asset($this->image);
        }
        return asset('storage/uploads/video/' . $this->image);
    }
}
