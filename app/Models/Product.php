<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nepali_name',
        'slug',
        'category',
        'district',
        'tag',
        'description',
        'detail',
        'grown_by',
        'storage',
        'pack_size',
        'price',
        'unit',
        'image',
        'order',
        'status',
    ];

    protected $appends = ['url_image'];

    public function outlets()
    {
        return $this->belongsToMany(Office::class);
    }

    public function getUrlImageAttribute()
    {
        if (!$this->image) {
            return asset('assets/images/products/greens-seasonal.jpg');
        }
        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http')) {
            return asset($this->image);
        }
        return asset('storage/uploads/product/' . $this->image);
    }
}
