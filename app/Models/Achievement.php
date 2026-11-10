<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['name', 
	'image', 
	'status',  ];
    protected $appends  = ['url_image'];

    public function getUrlImageAttribute() {
        if (!$this->image) {
            return asset('assets/images/gallery/farmer-cutting-millet.jpg');
        }
        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http')) {
            return asset($this->image);
        }
        return asset('storage/uploads/achievement/' . $this->image);
    }
}
