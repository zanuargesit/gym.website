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

    $startTime = Carbon::today()->toDateString() . ' ' . $request->input('start_time');
    $endTime = Carbon::today()->toDateString() . ' ' . $request->input('end_time');

    $overlap = Classes::where('start_time', '<', $endTime)
                      ->where('end_time', '>', $startTime)
                      ->exists();

    if ($overlap) {
        return redirect()->back()->withErrors(['start_time' => 'Class schedule overlaps with another class.'])->withInput();
    }

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

    $startTime = $request->has('start_time') ? Carbon::today()->toDateString() . ' ' . $request->input('start_time') : $class->start_time;
    $endTime = $request->has('end_time') ? Carbon::today()->toDateString() . ' ' . $request->input('end_time') : $class->end_time;

    $overlap = Classes::where('id', '!=', $id)
                      ->where('start_time', '<', $endTime)
                      ->where('end_time', '>', $startTime)
                      ->exists();

    if ($overlap) {
        return redirect()->back()->withErrors(['start_time' => 'Class schedule overlaps with another class.'])->withInput();
    }

    $class->update([
        'name_class' => $request->name_class,
        'description' => $request->description,
        'trainer_id' => $request->trainer_id,
        'start_time' => $startTime,
        'end_time' => $endTime,
        'capacity' => $request->capacity,
    ]);

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
