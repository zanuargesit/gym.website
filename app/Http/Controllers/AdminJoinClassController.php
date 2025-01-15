<?php
namespace App\Http\Controllers;

use App\Models\JoinClass;
use App\Models\Classes;
use Illuminate\Http\Request;

class AdminJoinClassController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $joinClasses = JoinClass::when($search, function ($query, $search) {
            return $query->where('class->name_class', 'like', '%' . $search . '%');
        })->paginate(5);

        return view('admin.admin_joinclasses.index', compact('joinClasses'));
    }

    public function destroy(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|in:no_join,schedule_conflict,other',
        ]);

        $joinClass = JoinClass::findOrFail($id);

        $class = $joinClass->class;

        $class->increment('capacity');

        $joinClass->delete();

        return redirect()->route('user.profile.index')->with('success', 'Anda telah keluar dari kelas.');
    }
}
