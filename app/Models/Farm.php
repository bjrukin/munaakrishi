<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nepali_name',
        'slug',
        'province',
        'district',
        'altitude',
        'practice',
        'produce',
        'farmers_count',
        'description',
        'image',
        'order',
        'status',
    ];

    protected $appends = ['url_image'];

    public function getUrlImageAttribute()
    {
        if (!$this->image) {
            return asset('assets/images/farms/nepal-terrace-farm.jpg');
        }
        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http')) {
            return asset($this->image);
        }
        return asset('storage/uploads/farm/' . $this->image);
    }
}
