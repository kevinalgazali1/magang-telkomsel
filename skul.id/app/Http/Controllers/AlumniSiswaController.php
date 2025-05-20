<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use App\Models\AlumniSiswaProfile;
use Illuminate\Support\Facades\Auth;

class AlumniSiswaController extends Controller
{
    public function index()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.beranda', compact('user'));
    }

    public function addProfile()
    {
        $user = Auth::user();

        // Jika profile sudah lengkap, redirect ke halaman utama alumni
        if ($user->profile_complete) {
            return redirect()->route('alumni-siswa.index');
        }

        $no_hp = Auth::user()->no_hp;

        return view('alumni-siswa.addProfile', compact('no_hp'));
    }

    public function storeProfile(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string',
            'nisn' => 'required|string|unique:alumni_siswa_profiles,nisn,' . Auth::id() . ',user_id',
            'kelas' => 'required|numeric',
            'tahun_kelulusan' => 'nullable|numeric',
            'jurusan' => 'required|string',
            'asal_sekolah' => 'required|string',
            'no_telepon' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'status' => 'required|string',
            'status_saat_ini' => 'nullable|string',
            'bidang_pekerjaan' => 'nullable|string',
            'sertifikasi_terakhir' => 'nullable|string',
            'kesesuaian_sertifikasi' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'kota' => 'nullable|string',
            'npsn' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        // Simpan/update profil
        $validatedProfile = $validated;
        unset($validatedProfile['email']); // email bukan bagian profile, hapus supaya tidak masuk ke profile

        $validatedProfile['user_id'] = Auth::id();

        AlumniSiswaProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedProfile
        );

        // Update user (termasuk email dan profile_complete)
        $user = User::find(Auth::id());
        $user->email = $validated['email'];
        $user->profile_complete = true;
        $user->save();

        return redirect()->route('alumni-siswa.index')->with('success', 'Profil berhasil disimpan!');
    }

    public function profile()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.editProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama_lengkap' => 'required|string',
            'nisn' => 'required|string|unique:alumni_siswa_profiles,nisn,' . Auth::id() . ',user_id',
            'kelas' => 'required|numeric',
            'tahun_kelulusan' => 'nullable|numeric',
            'jurusan' => 'required|string',
            'asal_sekolah' => 'required|string',
            'no_telepon' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'status' => 'required|string',
            'status_saat_ini' => 'nullable|string',
            'bidang_pekerjaan' => 'nullable|string',
            'sertifikasi_terakhir' => 'nullable|string',
            'kesesuaian_sertifikasi' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'kota' => 'nullable|string',
            'npsn' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Update profile
        AlumniSiswaProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'nama_lengkap' => $validated['nama_lengkap'],
                'nisn' => $validated['nisn'] ?? null,
                'kelas' => $validated['kelas'] ?? null,
                'tahun_kelulusan' => $validated['tahun_kelulusan'] ?? null,
                'jurusan' => $validated['jurusan'],
                'asal_sekolah' => $validated['asal_sekolah'],
                'no_hp' => $validated['no_hp'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'alamat' => $validated['alamat'],
            ]
        );

        // Update user email
        $user->email = $validated['email'];
        $user->save();

        return redirect()->route('alumni-siswa.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function sertifikasi()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        $sertifikasi = Sertifikasi::all();
        return view('alumni-siswa.sertifikasi', compact('user', 'sertifikasi'));
    }

    public function loker()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        $loker = Loker::all();
        return view('alumni-siswa.loker', compact('user', 'loker'));
    }

    public function pelatihan()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.pelatihan', compact('user'));
    }

    public function ikatan()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.ikatan', compact('user'));
    }

    public function kuliah()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.kuliah', compact('user'));
    }

    public function artikel()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.artikel', compact('user'));
    }

    public function ebook()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.ebook', compact('user'));
    }

    public function jelajah()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.jelajah', compact('user'));
    }
}
