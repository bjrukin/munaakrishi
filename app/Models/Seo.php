<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = ['name', 'url', 'meta_title', 'meta_description'];
}
