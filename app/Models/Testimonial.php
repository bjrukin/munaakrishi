<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'company', 'reviews', 'image', 'status', 'order'];
    protected $appends  = ['url_image'];

    public function scopePublished($query)
    {
        return $query->where('status', 1)->orderBy('order')->orderBy('id');
    }

    public function getPlainReviewAttribute(): string
    {
        $text = html_entity_decode(strip_tags((string) $this->reviews), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = preg_replace('/\s+/u', ' ', $text) ?? '';

        return trim($text, " \t\n\r\0\x0B\"“”‘’");
    }

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
