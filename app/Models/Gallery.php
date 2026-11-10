<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $fillable = ['id', 
	'name', 
	'slug', 
	'folder', 
	'image', 
	'status', 
	'meta_title', 
	'meta_description', ];
    protected $appends = ['url_image'];

    public function getUrlImageAttribute() {
        return Storage::disk('public')->url('gallery/' . $this->folder . '/' . $this->image);
    }

    public function images() {
        return $this->hasMany(GalleryImage::class, 'gallery_id', 'id')->oldest('order');
    }
}
