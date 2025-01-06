<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',  
        'name',
        'email',
        'password',
        'no_telepon',
        'role',
        'status',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', 
        'password' => 'hashed',  
    ];

    public function isActive()
    {
        return $this->status === 'active';
    }
}
