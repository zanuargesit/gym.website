<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    function showRegister()
    {
        return view('auth.register');
    }

    function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ], [
            "email.required" => "Email Harus Diisi",
            "email.email" => "Email Harus Valid",
            "password.required" => "Password Harus Diisi",
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.username.index')->with('successLogin', 'Login Berhasil');
            } elseif ($user->role == 'user') {
                return redirect('dashboard')->with('successLogin', 'Login Berhasil');
            } elseif ($user->role == 'trainer') {
                return redirect('dashboard.trainer')->with('successLogin', 'Login Berhasil');
            }

            return redirect('auth.login')->with('error', 'Anda belum punya akun');
        } else {
            return back()->with('failed', 'Login Gagal, Email atau Password salah!')->withInput();
        }
    }

    function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8",
            "confirmed_password" => "required|same:password",
            "no_telepon" => "required",
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon,
        ]);

        if ($user) {
            Auth::login($user);

            return redirect(route('user.dashboard'))->with('successRegister', 'Register Berhasil');
        } else {
            return redirect(route('register'))->with('errorRegister', 'Register Gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('successLogout', 'Anda telah Logout');
    }
}
