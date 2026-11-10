<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model {
    protected $fillable = ['name', 'image', 'status'];
    protected $appends  = ['url_image'];

    public function getUrlImageAttribute() {
        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http')) {
            return asset($this->image);
        }

        return asset('storage/banner/' . $this->image);
    }
}
