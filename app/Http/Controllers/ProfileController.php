<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

 
    public function create() {}

   
    public function store(Request $request)
    {
        
    }

   
    public function show(string $id)
    {
        
    }

   
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_telepon' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $user->fill($request->all());

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::delete('public/' . $user->foto);
            }

            $filePath = $request->file('foto')->store('uploads', 'public');
            $user->foto = $filePath;
        }

        $user->save();
        return redirect()->route('profile.edit', $user->id)->with('success', 'Profilmu berhasil diperbarui.');
    }

  
    public function destroy(string $id)
    {
        //
    }

    public function deletePhoto($id)
    {
        $user = User::findOrFail($id);

        if ($user->foto) {
            Storage::delete('public/' . $user->foto);
            $user->foto = null;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }
}
