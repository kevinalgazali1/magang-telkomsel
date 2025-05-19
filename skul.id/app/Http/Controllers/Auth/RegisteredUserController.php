<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use App\Models\MitraProfile;
use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use Illuminate\Validation\Rules;
use App\Models\AlumniSiswaProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function showMitraForm(): View
    {
        return view('auth.registerMitra');
    }

    public function showAlumniForm(): View
    {
        return view('auth.registerAlumni');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $role = $request->input('role');

        // Validasi umum
        $validator = Validator::make($request->all(), [
            'no_hp' => [
                'required',
                'unique:users,no_hp',
                'regex:/^08(11|12|13|21|22|51|52|53)[0-9]{5,8}$/'
            ],
            'password' => 'required|confirmed|min:8',
        ], [
            'no_hp.regex' => 'Nomor HP harus menggunakan salah satu kartu telkomsel.',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Simpan ke tabel users
        $user = User::create([
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'role' => $role,
            'password' => Hash::make($request->input('password')),
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect berdasarkan role
        if ($role === 'mitra') {
            return redirect()->route('mitra.addProfile')->with('success', 'Registrasi berhasil sebagai Mitra!');
        } elseif ($role === 'alumnisiswa') {
            return redirect()->route('alumni-siswa.addProfile')->with('success', 'Registrasi berhasil sebagai Alumni / Siswa!');
        }

        // Fallback jika role tidak dikenali
        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }
}
