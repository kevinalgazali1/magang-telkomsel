<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Cek apakah pengguna sudah memiliki profil
        if (!$user->profile_complete) {
            return redirect()->route('alumni-siswa.addProfile');
        }

        return $next($request);
    }
}
