<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'company', 'reviews', 'image', 'status'  ];
    protected $appends  = ['url_image'];

    public function getUrlImageAttribute() {
        if (!$this->image) {
            return asset('assets/images/team/team-field.jpg');
        }
        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http')) {
            return asset($this->image);
        }
        return asset('storage/uploads/testimonial/' . $this->image);
    }
}
