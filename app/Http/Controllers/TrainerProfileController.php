<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;


class TrainerProfileController extends Controller
{
    // Menampilkan kelas yang diampu oleh trainer
    public function trainerClasses(): Collection
    {
        $trainer = Auth::user(); 
        if ($trainer && $trainer->role === 'trainer') {
            return Classes::where('trainer_id', $trainer->id)->with('trainer')->get();
        }
        return collect(); 
    }

    // Menampilkan profil trainer
    public function index()
    {
        $trainer = Auth::user();
        $classes = $this->trainerClasses(); 

        return view('trainer.profile', compact('trainer', 'classes'));
    }
    public function deletePhoto($id)
    {
        $user = User::findOrFail($id);
        if ($user->foto) {
            Storage::delete('public/foto/' . $user->foto);
            $user->foto = null;
            $user->save();
        }
        return redirect()->route('trainer.profile')->with('success', 'Foto berhasil dihapus');
    }
    
    // Memperbarui profil trainer
    public function updateTrainerProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/foto');
            $user->foto = basename($path);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('trainer.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
