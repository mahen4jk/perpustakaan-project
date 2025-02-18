<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::guard('pendik')->user(); // Mengambil pengguna yang sedang login

        // Cek apakah pengguna terautentikasi
        if (!$user) {
            return redirect('login');
        }

        // Debugging: Print the user roles
        // dd($user->roles);
        \Log::info('User Roles: ' . trim($user->roles));
        \Log::info('Allowed Roles: ' . implode(',', $roles));

        // $userRole = trim($user->roles);
        // \Log::info('User Role: ' . $userRole);
        // \Log::info('Allowed Roles: ' . implode(',', $roles));

        // Role yang diizinkan
        $allowedRoles = ['admin', 'pustaka', 'kep_perpus'];

        // Cek apakah role pengguna termasuk dalam role yang diizinkan
        // if (!in_array($user->roles, $roles)) {
        //     \Log::info('Unauthorized access attempt by user with role: ' . trim($user->roles));
        //     return redirect('/unauthorized'); // Redirect jika pengguna tidak memiliki role yang diizinkan
        // }

        // Cek apakah role pengguna termasuk dalam role yang diizinkan
        if (!in_array($user->roles, $allowedRoles)) {
            \Log::info('Unauthorized access attempt by user with role: ' . trim($user->roles));
            return redirect('/unauthorized'); // Redirect jika pengguna tidak memiliki role yang diizinkan
        }

        return $next($request);
    }
}
