<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
  
    protected $fillable = [
        'name_class',
        'description',
        'trainer_id',
        'start_time',
        'end_time',
        'capacity',
    ];

    public function trainer()
    {
        return $this->belongsTo(Users::class, 'trainer_id');
    }
}
