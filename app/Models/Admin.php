<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['role_id', 'name', 'email', 'username', 'password', 'status'];
    protected $hidden = ['password'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
