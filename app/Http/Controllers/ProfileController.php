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

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
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

            // Mengupload foto baru
            $filePath = $request->file('foto')->store('uploads', 'public');
            $user->foto = $filePath;
        }

        $user->save();
        return redirect()->route('profile.edit', $user->id)->with('success', 'Profilmu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deletePhoto($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto dari storage
        if ($user->foto) {
            Storage::delete('public/' . $user->foto);
            $user->foto = null;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }
}
