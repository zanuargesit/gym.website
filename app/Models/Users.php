<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user'; // Nama tabel sesuai dengan database
    protected $fillable = [
        'username',
        'email',
        'password',
        'no_telepon',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
