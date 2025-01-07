<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
    use Carbon\Carbon;

class ClassesController extends Controller
{
    public function index(Request $request)
    {
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
        return view('admin.admin_classes.create', compact('trainers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_class' => 'required|string|max:255',
            'description' => 'required|string',
            'trainer_id' => 'required|exists:users,id',
            'start_time' => 'required|date_format:H:i',  
            'end_time' => 'required|date_format:H:i',   
            'capacity' => 'required|integer',
        ]);
    
        $today = Carbon::today()->toDateString();  // YYYY-MM-DD
    
        $startTime = Carbon::createFromFormat('H:i', $request->input('start_time'))->format('Y-m-d H:i:s');
        $endTime = Carbon::createFromFormat('H:i', $request->input('end_time'))->format('Y-m-d H:i:s');
    
        Classes::create([
            'name_class' => $request->name_class,
            'description' => $request->description,
            'trainer_id' => $request->trainer_id,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'capacity' => $request->capacity,
        ]);
    
        return redirect()->route('admin.classes.index')->with('success', 'Class successfully added.');
    }
    
    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        $trainers = User::where('role', 'trainer')->get();
        return view('admin.admin_classes.edit', compact('class', 'trainers'));
    }
    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);
    
        $request->validate([
            'name_class' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'trainer_id' => 'sometimes|exists:users,id',
            'start_time' => 'sometimes|date_format:H:i',  
            'end_time' => 'sometimes|date_format:H:i',    
            'capacity' => 'sometimes|integer',
        ]);
    
        $today = Carbon::today()->toDateString(); 
    
        if ($request->has('start_time')) {
            $startTime = Carbon::createFromFormat('H:i', $request->input('start_time'))->format('Y-m-d H:i:s');
        } else {
            $startTime = $class->start_time; 
        }
    
        if ($request->has('end_time')) {
            $endTime = Carbon::createFromFormat('H:i', $request->input('end_time'))->format('Y-m-d H:i:s');
        } else {
            $endTime = $class->end_time; 
        }
    
        $class->update([
            'name_class' => $request->name_class,
            'description' => $request->description,
            'trainer_id' => $request->trainer_id,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'capacity' => $request->capacity,
        ]);
    
        // Redirect back with success message
        return redirect()->route('admin.classes.index')->with('success', 'Class successfully updated.');
    }
    
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();

        return redirect()->route('admin.classes.index')->with('success', 'Class successfully deleted.');
    }

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
