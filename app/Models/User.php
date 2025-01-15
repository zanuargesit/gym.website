<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function joinClasses(): HasMany
    {
        return $this->hasMany(JoinClass::class, 'user_id');
    }

    public function isTrainer()
    {
        return $this->role === 'trainer';
    }

    public function trainerClasses(): HasMany
    {
        return $this->hasMany(Classes::class, 'trainer_id');
    }
}
