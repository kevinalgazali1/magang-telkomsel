<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\DaftarLoker;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use App\Models\DaftarSertifikasi;
use Illuminate\Support\Facades\Auth;

class DaftarController extends Controller
{
    public function storeDaftarSertifikasi(Request $request, Sertifikasi $sertifikasi)
    {
        try {
            $user = Auth::user(); // user yang sedang login
            $profile = $user->alumniSiswaProfile;

            if (!$profile) {
                return redirect()->back()->with('error', 'Data profil alumni belum lengkap.');
            }

            // Cek jika sudah pernah mendaftar sertifikasi (opsional)
            $alreadyRegistered = DaftarSertifikasi::where('user_id', $user->id)
                ->where('nama_lengkap', $profile->nama_lengkap)
                ->exists();

            if ($alreadyRegistered) {
                return redirect()->back()->with([
                    'message' => 'Anda sudah pernah mendaftar sertifikasi.',
                    'alert-type' => 'warning',
                ]);
            }


            // Simpan data ke daftar_sertifikasis
            DaftarSertifikasi::create([
                'user_id'           => $user->id,
                'sertifikasi_id'    => $sertifikasi->id,
                'email'             => $user->email,
                'no_hp'             => $user->no_hp,
                'nama_lengkap'      => $profile->nama_lengkap,
                'asal_sekolah'      => $profile->asal_sekolah,
                'jurusan'           => $profile->jurusan,
                'jenis_kelamin'     => $profile->jenis_kelamin,
                'tanggal_lahir'     => $profile->tanggal_lahir,
            ]);

            return redirect()->back()->with('success', 'Pendaftaran sertifikasi berhasil.');
        } catch (\Exception $e) {
            return redirect()->route('alumni-siswa.sertifikasi')->with([
                'message' => 'Gagal mendaftar sertifikasi. Error: ' . $e->getMessage(),
                'alert-type' => 'danger',
            ]);
        }
    }

    public function storeDaftarLoker(Request $request, Loker $loker)
    {
        try {
            $user = Auth::user(); // user yang sedang login
            $profile = $user->alumniSiswaProfile;

            if (!$profile) {
                return redirect()->back()->with('error', 'Data profil alumni belum lengkap.');
            }

            // Cek jika sudah pernah mendaftar sertifikasi (opsional)
            $alreadyRegistered = DaftarLoker::where('user_id', $user->id)
                ->where('nama_lengkap', $profile->nama_lengkap)
                ->exists();

            if ($alreadyRegistered) {
                return redirect()->back()->with([
                    'message' => 'Anda sudah pernah mendaftar lowongan kerja ini.',
                    'alert-type' => 'warning',
                ]);
            }

            $request->validate([
                'cv' => 'required|mimes:pdf|max:2048', // Max 2MB
            ]);
            $cv = $request->file('cv')->store('assets/cv', 'public');

            // Simpan data ke daftar_sertifikasis
            DaftarLoker::create([
                'user_id'           => $user->id,
                'loker_id'          => $loker->id,
                'email'             => $user->email,
                'no_hp'             => $user->no_hp,
                'nama_lengkap'      => $profile->nama_lengkap,
                'asal_sekolah'      => $profile->asal_sekolah,
                'jurusan'           => $profile->jurusan,
                'jenis_kelamin'     => $profile->jenis_kelamin,
                'tanggal_lahir'     => $profile->tanggal_lahir,
                'cv'                => $cv,
            ]);

            return redirect()->back()->with('success', 'Pendaftaran lowongan kerja berhasil.');
        } catch (\Exception $e) {
            return redirect()->route('alumni-siswa.loker')->with([
                'message' => 'Gagal mendaftar lowongan kerja. Error: ' . $e->getMessage(),
                'alert-type' => 'danger',
            ]);
        }
    }
}
