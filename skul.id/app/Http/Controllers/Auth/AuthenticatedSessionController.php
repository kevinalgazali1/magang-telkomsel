<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            if ($request->user()->role === "admin") {
                return redirect()->route('admin.dashboard');
            } else if ($request->user()->role === "mitra") {
                return redirect()->route('mitra.index');
            } else if ($request->user()->role === "alumni") {
                return redirect()->route('alumni-siswa.addProfile');
            }

            return redirect()->back();
        } catch (ValidationException $e) {
            return back()->withInput()->with('login_error', 'Nomor HP atau Password salah.');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
