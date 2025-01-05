<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Storage;

// class UserAdminController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index(Request $request)
//     {
//         $user = User::all();
//         return view('admin.manageuser.index', compact('user'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view('admin.manageuser.create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             "name" => "required",
//             "email" => "required|email|unique:users",
//             "password" => "required|min:8",
//             "no_telepon" => "required",
//             "role" => "required",
//         ]);

//         $user = new user($request->all());

//         $user->save();
//         // Redirect ke dashboard dengan pesan sukses
//         return redirect()->route('manageuser.index')->with('successTambah, User berhasil ditambahkan');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         $user = User::findOrFail($id); // Temukan user berdasarkan ID
//         return view('manageuser.edit', compact('user')); // Kirim data user
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         $user = User::findOrFail($id);
//         return view('admin.manageuser.edit', compact('user'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         $user = User::findOrFail($id);
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email,' . $user->id,
//             'password' => 'required|string|min:8',
//             'no_telepon' => 'required|string|max:20',
//             'role' => 'required',
//             'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
//         ]);

//         $user->fill($request->all());

//         if ($request->hasFile('foto')) {
//             if ($user->foto) {
//                 Storage::delete('public/' . $user->foto);
//             }

//             // Mengupload foto baru
//             $filePath = $request->file('foto')->store('uploads', 'public');
//             $user->foto = $filePath;
//         }

//         $user->save();
//         return redirect()->route('manageuser.index', $user->id)->with('success', 'Akun { $user->name } berhasil diperbarui.');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy($id)
//     {
//         $user = User::findOrFail($id); // Temukan user berdasarkan ID
//         $user->delete(); // Hapus user dari database

//         return redirect()->route('manageuser.index')->with('success', "Akun {$user->name} berhasil dihapus.");
//     }
// }
