<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\JoinClass;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassCartController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        $user = Auth::user();
        $membership = $user->membership;

        // Cek apakah membership ada dan aktif
        $memberStatus = 'non-aktif';
        if ($membership && $membership->isActive()) {
            $memberStatus = $membership->status; // status membership ('non-aktif', 'silver', 'gold')
        }

        // Hitung jumlah kelas yang sudah diikuti jika membership adalah 'silver'
        $joinedClassesCount = 0;
        if ($memberStatus == 'silver') {
            $joinedClassesCount = JoinClass::where('user_id', $user->id)
                ->where('status', 'confirmed')
                ->count();
        }
        return view('menu.classes', compact('classes', 'memberStatus', 'joinedClassesCount'));
    }

    public function joinClass($classId)
    {
        $user = Auth::user();
        $class = Classes::findOrFail($classId);

        $existingJoin = JoinClass::where('user_id', $user->id)
            ->where('class_id', $classId)
            ->first();

        if ($existingJoin) {
            return redirect()->route('user.profile.index')->with('error', 'You have already joined this class.');
        }

        if ($class->capacity <= 0) {
            return redirect()->route('user.profile.index')->with('error', 'This class is full.');
        }

        // Cek status membership dan batasan kelas
        $membership = $user->membership;

        if (!$membership || !$membership->isActive()) {
            return redirect()->route('user.profile.index')->with('error', 'Your membership is inactive or expired.');
        }

        // Hitung jumlah kelas yang sudah diikuti
        $joinedClassesCount = JoinClass::where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->count();

        // Jika status membership Silver dan jumlah kelas sudah lebih dari 3
        if ($membership->status === 'silver' && $joinedClassesCount >= 3) {
            return redirect()->route('user.profile.index')->with('error', 'You have reached the maximum number of classes for your Silver membership.');
        }

        $class->decrement('capacity');

        JoinClass::create([
            'user_id' => $user->id,
            'class_id' => $classId,
            'status' => 'confirmed',
            'booking_date' => now(),
        ]);

        return redirect()->route('user.profile.index')->with('success', 'You have successfully joined the class.');
    }
}
