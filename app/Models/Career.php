<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = ['id', 
	'expiry_date', 
	'name', 
	'slug', 
	'location', 
	'department', 
	'employment_type', 
	'experience', 
	'summary', 
	'responsibility', 
	'requirement', 
	'status', 
	'meta_title', 
	'meta_description', ];
}
