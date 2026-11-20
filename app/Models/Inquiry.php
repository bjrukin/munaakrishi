<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'type', 'name', 'phone', 'email', 'subject', 'message', 'details', 'status', 'read_at',
    ];

    protected $casts = [
        'details' => 'array',
        'read_at' => 'datetime',
    ];
}
