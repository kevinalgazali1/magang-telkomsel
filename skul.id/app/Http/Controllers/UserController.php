<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AlumniSiswaProfile;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function updateAccount(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => [
                'required',
                'unique:users,no_hp,' . Auth::id(),
                'regex:/^08(11|12|13|21|22|23|51|52|53)[0-9]{5,8}$/'
            ],
        ], [
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.unique' => 'Nomor HP sudah digunakan.',
            'no_hp.regex' => 'Nomor HP harus menggunakan salah satu kartu Telkomsel.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        try {
            $user = Auth::user();
            $user->email = $request->email;
            $user->no_hp = $request->no_hp;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Akun berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan perubahan.');
        }
    }

    public function exportAlumniCsv()
    {
        $alumni = AlumniSiswaProfile::with('user')->get(); // untuk ambil data user (misal email)

        $filename = 'data_alumni.csv';
        $handle = fopen('php://temp', 'w+');

        // Header kolom sesuai dengan field di tabel
        fputcsv($handle, [
            'No',
            'Nama Lengkap',
            'NIK',
            'Tahun Kelulusan',
            'Asal Sekolah',
            'Jurusan Sekolah',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'NPSN',
            'Provinsi',
            'Kota',
            'Alamat',
            'Status Saat Ini',
            'Bidang Pekerjaan',
            'Sertifikasi Terakhir',
            'Kesesuaian Sertifikasi',
            'Nama Universitas',
            'Jurusan Universitas'
        ]);

        foreach ($alumni as $index => $a) {
            fputcsv($handle, [
                $index + 1,
                $a->nama_lengkap,
                '="' . $a->nik . '"', // supaya NIK tidak diubah format di Excel
                $a->tahun_kelulusan,
                $a->asal_sekolah,
                $a->jurusan_sekolah,
                $a->jenis_kelamin,
                $a->tanggal_lahir,
                $a->npsn,
                $a->provinsi,
                $a->kota,
                $a->alamat,
                $a->status_saat_ini,
                $a->bidang_pekerjaan,
                $a->sertifikasi_terakhir,
                $a->kesesuaian_sertifikasi,
                $a->nama_universitas,
                $a->jurusan_universitas,
            ]);
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }
}
