<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{
    protected $fillable = ['name', 
	'designation', 
	'summary', 
	'information', 
	'image',  
	'mobile_image', 
	'order', 
	'status',   ];
    protected $appends  = ['url_image', 'url_mobile_image'];

    public function getUrlImageAttribute() {
        if (!$this->image) {
            return asset('assets/images/team/team-director.jpg');
        }
        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http')) {
            return asset($this->image);
        }
        return asset('storage/uploads/leadership/' . $this->image);
    }

    public function getUrlMobileImageAttribute() {
        if (!$this->mobile_image) {
            return $this->url_image;
        }
        if (str_starts_with($this->mobile_image, 'assets/') || str_starts_with($this->mobile_image, 'http')) {
            return asset($this->mobile_image);
        }
        return asset('storage/uploads/leadership/' . $this->mobile_image);
    }
}
