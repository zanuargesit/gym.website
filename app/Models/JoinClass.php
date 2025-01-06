<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinClass extends Model
{
    protected $fillable = ['user_id', 'class_id', 'booking_date', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
