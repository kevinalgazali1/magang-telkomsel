<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MitraProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MitraController extends Controller
{
    public function addProfile()
    {
        // Ambil daftar provinsi dari API
        $provinsi = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')->json();

        // Default: ambil kabupaten dari provinsi Sulawesi Selatan (id 73)
        $kabupaten = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/73.json')->json();

        $user = Auth::user();

        // Jika profile sudah lengkap, redirect ke halaman utama alumni
        if ($user->profile_complete) {
            return redirect()->route('alumni-siswa.index');
        }

        $no_hp = Auth::user()->no_hp;

        return view('mitra.addProfile', compact('provinsi', 'kabupaten', 'no_hp'));
    }

    public function storeProfile(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan'     => 'required|string|max:255',
            'penanggung_jawab'    => 'required|string|max:255',
            'NPWP'                => 'required|string|max:30',
            'alamat'              => 'required|string',
            'provinsi'            => 'required|string',
            'kota'                => 'required|string',
            'bidang_industri'     => 'required|string',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        // Simpan/update profil
        $validatedProfile = $validated;
        unset($validatedProfile['email']); // email bukan bagian profile, hapus supaya tidak masuk ke profile

        $validatedProfile['user_id'] = Auth::id();

        MitraProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedProfile
        );

        // Update user (termasuk email dan profile_complete)
        $user = User::find(Auth::id());
        $user->email = $validated['email'];
        $user->profile_complete = true;
        $user->save();

        return redirect()->route('mitra.index')->with('success', 'Profil berhasil disimpan!');
    }

    public function index()
    {
        $User = User::all();
        return view('mitra.beranda', compact('User'));
    }

    public function sertifikasi()
    {
        $User = User::all();
        return view('mitra.sertifikasi', compact('User'));
    }

    public function loker()
    {
        return view('mitra.loker');
    }

    public function pelatihan()
    {
        return view('mitra.pelatihan');
    }
}
