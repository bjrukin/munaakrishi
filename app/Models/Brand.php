<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 
	'image', 
	'status',  ];
    protected $appends  = ['url_image'];

    public function getUrlImageAttribute() {
        return asset('storage/uploads/brand/' . $this->image);
    }
}
