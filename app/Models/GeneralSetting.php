<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GeneralSetting extends Model
{
    protected $fillable = ['company_name', 
	'established_year', 
	'phone', 
	'email', 
	'address', 
	'meta_title', 
	'meta_description', 
	'og_image', ];

    
    protected $appends  = ['url_og_image'];

    public function getUrlOgImageAttribute() {
        return asset('storage/uploads/generalsetting/' . $this->og_image);
    }

}
