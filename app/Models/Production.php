<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = ['name', 
	'image', 
	'description', 
	'order', 
	'status', ];
    protected $appends  = ['url_image'];

    public function getUrlImageAttribute() {
        return asset('storage/uploads/production/' . $this->image);
    }
}
