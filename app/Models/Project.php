<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 
	'image', 
	'status',  ];
    protected $appends  = ['url_image'];

    public function getUrlImageAttribute() {
        return asset('storage/uploads/project/' . $this->image);
    }
}
