<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Cek apakah pengguna login dan memiliki role yang sesuai
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        // Jika tidak sesuai, arahkan ke halaman lain
        return redirect('/unauthorized')->with('error', 'Anda tidak memiliki akses ke halaman ini.'); // Atau sesuaikan dengan kebutuhan Anda
    }
}
