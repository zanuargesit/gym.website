<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;


use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index(Request $request)
    {
        //controller punya admin

        $search = $request->input('search');
        $classes = Classes::with('trainer')
            ->when($search, function ($query, $search) {
                return $query->where('name_class', 'like', '%' . $search . '%');
            })
            ->paginate(5);
        return view('admin.admin_classes.index', compact('classes'));
    }


    public function create()
    {
        $trainers = User::where('role', 'trainer')->get();
        $classes = Classes::with('trainer')->paginate(10);

        return view('admin.admin_classes.create', compact('trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_class' => 'required|string|max:255',
            'description' => 'required|string',
            'trainer_id' => 'required|exists:user,id',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'capacity' => 'required|integer',
        ]);

        Classes::create($request->all());

        return redirect()->route('admin.classes.index')->with('success', 'Class successfully added.');
    }

    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        $trainers = User::where('role', 'trainer')->get();
        return view('classes.edit', compact('class', 'trainers'));
    }

    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);
        $request->validate([
            'name_class' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'trainer_id' => 'sometimes|exists:user,id',
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date',
            'capacity' => 'sometimes|integer',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Class successfully updated.');
    }

    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class successfully deleted.');
    }

    //controller punya user
    public function indexUser(Request $request)
    {
        $search = $request->input('search');
        $classes = Classes::with('trainer')
            ->when($search, function ($query, $search) {
                return $query->where('name_class', 'like', '%' . $search . '%');
            })
            ->paginate(5);
        return view('menu.classes', compact('classes'));
    }
}
