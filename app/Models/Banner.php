<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model {
    protected $fillable = ['name', 'sub_title', 'image', 'status', 'page_id'];
    protected $appends  = ['url_image'];

    public function getUrlImageAttribute() {
        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http')) {
            return asset($this->image);
        }

        return asset('storage/banner/' . $this->image);
    }

    public function page(){
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }
}
