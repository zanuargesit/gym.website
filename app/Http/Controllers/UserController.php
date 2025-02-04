<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('username', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('admin.admin_user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.admin_user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'no_telepon' => 'nullable|string|max:15',
            'role' => 'required|in:admin,user,trainer',
            'status' => 'required|in:active,inactive',
        ]);

        User::create([
            'username' => $request->input('username'),
            'name' => $request->input('name'),  
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'no_telepon' => $request->input('no_telepon'),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.username.index')->with('success', 'User successfully created.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.admin_user.edit', compact('user'));
    }
    
    
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'no_telepon' => 'nullable|string|max:15',
            'role' => 'required|in:admin,user,trainer',
            'status' => 'required|in:active,inactive',
        ]);
    
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'no_telepon' => $request->no_telepon,
            'role' => $request->role,
            'status' => $request->status,
        ]);
    
        return redirect()->route('admin.username.index')->with('success', 'User successfully updated.');
    }
    
    

    public function destroy($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->delete();

        return redirect()->route('admin.username.index')->with('success', 'User successfully deleted.');
    }
}
