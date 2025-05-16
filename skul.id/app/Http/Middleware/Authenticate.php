<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            // Cek URL yang sedang diakses untuk menentukan login mana yang sesuai
            if ($request->is('alumni/*')) {
                return route('login.alumni'); // Pastikan route ini ada
            }

            if ($request->is('mitra/*')) {
                return route('login.mitra'); // Pastikan route ini ada
            }

            if ($request->is('siswa/*')) {
                return '/login/siswa'; // Jika punya login siswa
            }

            if ($request->is('admin/*')) {
                return '/login/admin'; // Jika punya login admin
            }

            // Fallback ke login default
            return '/login/alumni';
        }

        return null;
    }
}
