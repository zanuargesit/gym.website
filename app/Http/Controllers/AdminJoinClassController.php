<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JoinClass;
use Illuminate\Http\Request;

class AdminJoinClassController extends Controller
{
    public function index(  Request $request)
    {
        $search = $request->input('search');

        $joinClasses = JoinClass::when($search, function ($query, $search) {
            return $query->where('class->name_class ', 'like', '%' . $search . '%');
        })->paginate(5);  

        return view('admin.admin_joinclasses.index', compact('joinClasses'));
    }

    public function destroy($id)
    {
        $joinClass = JoinClass::findOrFail($id);
        $joinClass->delete();

        return redirect()->route('admin.joinclasses.index')->with('success', 'Join class entry deleted successfully.');
    }
}
