<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_class', 'description', 'trainer_id', 'start_date', 'end_date', 'start_time', 'end_time', 'capacity',
    ];

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function joinClasses()
    {
        return $this->hasMany(JoinClass::class);
    }
}
