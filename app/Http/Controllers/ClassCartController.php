<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\JoinClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassCartController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('menu.classes', compact('classes'));
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
