<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Page extends Model {
    protected $fillable = ['name',
        'slug',
        'image',
        'description',
        'status',
        'meta_title',
        'meta_description'];
        protected $appends  = ['url_image'];

        public function getUrlImageAttribute() {
            return asset('storage/uploads/page/' . $this->image);
        }
}