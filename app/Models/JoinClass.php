<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinClass extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'class_id', 'booking_date', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    // Menentukan apakah anggota sudah bergabung dengan kelas atau belum
    public function scopeNotJoined($query)
    {
        return $query->where('status', 'no join');
    }

    // Menghitung jumlah kelas yang telah diikuti oleh anggota
    public static function joinedClassesCount($userId)
    {
        return JoinClass::where('user_id', $userId)
            ->where('status', 'confirmed')
            ->count();
    }

    // Memeriksa apakah anggota bisa bergabung dengan kelas
    public static function canJoinClass($userId)
    {
        // Ambil status membership anggota
        $membership = Membership::where('user_id', $userId)->latest()->first();

        if (!$membership || !$membership->isActive()) {
            return false; // Membership tidak aktif
        }

        // Ambil jumlah kelas yang sudah diikuti
        $joinedClasses = self::joinedClassesCount($userId);

        if ($membership->status === 'silver') {
            // Anggota Silver hanya boleh mengikuti 3 kelas
            return $joinedClasses <= 3;
        } elseif ($membership->status === 'gold') {
            // Anggota Gold bisa mengikuti kelas tanpa batas
            return true;
        } else {
            return false;
        }

        // Anggota Gold bisa mengikuti kelas tanpa batas
        return true;
    }
}
