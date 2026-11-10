<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryImage extends Model
{
    protected $fillable = ['gallery_id', 
	'name', 
	'image', 
	'order', 
	'status', ];

    protected $appends = ['url_image'];

    public function getUrlImageAttribute()
    {
        return Storage::disk('public')->url('gallery/'. $this->gallery->folder. '/'. $this->image);
    }
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }
}
