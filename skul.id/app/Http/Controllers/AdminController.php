<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\Artikel;
use App\Models\Pelatihan;
use App\Models\Sertifikasi;
use App\Models\MitraProfile;
use Illuminate\Http\Request;
use App\Models\AlumniSiswaProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $totalSertifikasi = Sertifikasi::count();
        $totalPelatihan = Pelatihan::count();
        $totalLoker = Loker::count();
        $jumlahSekolah = AlumniSiswaProfile::whereNotNull('asal_sekolah')->distinct()->count('asal_sekolah');
        $jumlahPeserta = AlumniSiswaProfile::count();
        $jumlahMitra = MitraProfile::count();
        $mitras = MitraProfile::with('user')->latest()->get();

        return view('admin.dashboard', compact(
            'totalSertifikasi',
            'totalPelatihan',
            'totalLoker',
            'jumlahSekolah',
            'jumlahPeserta',
            'jumlahMitra',
            'mitras'
        ));
    }

    public function artikel()
    {
        $artikel = Artikel::all();
        return view('admin.artikel', compact('artikel'));
    }

    public function sertifikasi()
    {
        $sertifikasis = Sertifikasi::with([
            'user.mitraProfile',
            'daftarSertifikasis.user',  // eager load relasi user dari daftarSertifikasis
        ])
            ->withCount('daftarSertifikasis') // hitung jumlah relasi daftarSertifikasis
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.sertifikasi', [
            'title' => 'Manajemen Sertifikasi',
            'sertifikasis' => $sertifikasis,
        ]);
    }


    /**
     * Menangani aksi store/update/delete sertifikasi.
     */
    public function handleSertifikasi(Request $request)
    {
        $action = $request->input('action');

        // ===== STORE =====
        if ($action === 'store') {
            $validated = $request->validate([
                'judul_sertifikasi' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'biaya' => 'nullable|numeric',
                'kota' => 'required|string|max:100',
                'tempat' => 'required|string|max:255',
                'status' => 'required|string|in:Aktif,Nonaktif',
                'foto_sertifikasi' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                // tidak perlu validasi user_id/mitra karena otomatis dari login
            ]);

            $sertifikasi = new Sertifikasi();
            $sertifikasi->user_id = auth()->id(); // asumsi: si mitra sedang login
            $sertifikasi->judul_sertifikasi = $validated['judul_sertifikasi'];
            $sertifikasi->deskripsi = $validated['deskripsi'];
            $sertifikasi->tanggal_mulai = $validated['tanggal_mulai'];
            $sertifikasi->tanggal_selesai = $validated['tanggal_selesai'];
            $sertifikasi->biaya = $validated['biaya'];
            $sertifikasi->kota = $validated['kota'];
            $sertifikasi->tempat = $validated['tempat'];
            $sertifikasi->status = $validated['status'];
            // simpan foto
            $sertifikasi->foto_sertifikasi = $request->file('foto_sertifikasi')->store('sertifikasis', 'public');
            $sertifikasi->save();

            return redirect()->route('admin.sertifikasi')->with('success', 'Sertifikasi berhasil ditambahkan.');
        }

        // ===== UPDATE =====
        if ($action === 'update') {
            $validated = $request->validate([
                'id' => 'required|exists:sertifikasis,id',
                'judul_sertifikasi' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'biaya' => 'nullable|numeric',
                'kota' => 'required|string|max:100',
                'tempat' => 'required|string|max:255',
                'status' => 'required|string|in:Aktif,Nonaktif',
                'foto_sertifikasi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $sertifikasi = Sertifikasi::findOrFail($validated['id']);
            $sertifikasi->judul_sertifikasi = $validated['judul_sertifikasi'];
            $sertifikasi->deskripsi = $validated['deskripsi'];
            $sertifikasi->tanggal_mulai = $validated['tanggal_mulai'];
            $sertifikasi->tanggal_selesai = $validated['tanggal_selesai'];
            $sertifikasi->biaya = $validated['biaya'];
            $sertifikasi->kota = $validated['kota'];
            $sertifikasi->tempat = $validated['tempat'];
            $sertifikasi->status = $validated['status'];

            // Jika ada foto baru, hapus foto lama & simpan yang baru
            if ($request->hasFile('foto_sertifikasi')) {
                if ($sertifikasi->foto_sertifikasi) {
                    Storage::disk('public')->delete($sertifikasi->foto_sertifikasi);
                }
                $sertifikasi->foto_sertifikasi = $request->file('foto_sertifikasi')->store('sertifikasis', 'public');
            }

            $sertifikasi->save();
            return redirect()->route('admin.sertifikasi')->with('success', 'Sertifikasi berhasil diperbarui.');
        }

        // ===== DELETE =====
        if ($action === 'delete') {
            $request->validate([
                'id' => 'required|exists:sertifikasis,id',
            ]);

            $sertifikasi = Sertifikasi::findOrFail($request->id);
            if ($sertifikasi->foto_sertifikasi) {
                Storage::disk('public')->delete($sertifikasi->foto_sertifikasi);
            }
            $sertifikasi->delete();
            return redirect()->route('admin.sertifikasi')->with('success', 'Sertifikasi berhasil dihapus.');
        }

        // Jika tidak ada action yang cocok, kembali saja
        return redirect()->route('admin.sertifikasi');
    }

    public function loker()
    {
        $lokers = Loker::with('user.mitraProfile')->latest()->get();
        $title = "Manajemen Loker";

        return view('admin.loker', compact('lokers', 'title'));
    }

    public function pelatihan(Request $request)
    {
        if ($request->isMethod('post')) {
            $action = $request->input('action');

            if ($action === 'store') {
                $validated = $request->validate([
                    'nama_pelatihan' => 'required',
                    'tempat_pelatihan' => 'required',
                    'tanggal_mulai' => 'required|date',
                    'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                    'deskripsi' => 'required',
                    'biaya' => 'nullable',
                    'kota' => 'required',
                    'status' => 'required',
                    'foto_pelatihan' => 'required|image|max:2048',
                ]);

                $validated['user_id'] = auth()->id(); // atau isi dengan user mitra sesuai kebutuhan
                $validated['foto_pelatihan'] = $request->file('foto_pelatihan')->store('pelatihan');

                Pelatihan::create($validated);

                return redirect()->back()->with('success', 'Pelatihan berhasil ditambahkan.');
            }

            if ($action === 'update') {
                $pelatihan = Pelatihan::findOrFail($request->input('id'));

                $data = $request->except(['action', 'id', 'foto_pelatihan']);
                if ($request->hasFile('foto_pelatihan')) {
                    $data['foto_pelatihan'] = $request->file('foto_pelatihan')->store('pelatihan');
                }

                $pelatihan->update($data);
                return redirect()->back()->with('success', 'Pelatihan berhasil diupdate.');
            }

            if ($action === 'delete') {
                Pelatihan::destroy($request->input('id'));
                return redirect()->back()->with('success', 'Pelatihan berhasil dihapus.');
            }
        }

        return view('admin.pelatihan', [
            'title' => 'Pelatihan',
            'pelatihans' => Pelatihan::with('user')->latest()->get(),
        ]);
    }

    public function users()
    {
        $profiles = AlumniSiswaProfile::with('user')->get();
        $users = User::all(); // untuk select user saat tambah/edit
        return view('admin.usersalumni', [
            'title' => 'Data Users',
            'profiles' => $profiles,
            'users' => $users,
        ]);
    }

    // // Update data
    // public function usersUpdate(Request $request)
    // {
    //     $request->validate([
    //         'id' => 'required|exists:alumni_siswa_profiles,id',
    //         'user_id' => 'required|exists:users,id',
    //         'nama_lengkap' => 'required',
    //         'nik' => 'required|unique:alumni_siswa_profiles,nik,' . $request->id,
    //         'tahun_kelulusan' => 'nullable|digits:4',
    //         'asal_sekolah' => 'required',
    //         'jurusan_sekolah' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'tanggal_lahir' => 'required|date',
    //         'npsn' => 'required',
    //         'provinsi' => 'required',
    //         'kota' => 'required',
    //         'alamat' => 'required',
    //         'status_saat_ini' => 'required',
    //     ]);

    //     $profile = AlumniSiswaProfile::findOrFail($request->id);
    //     $profile->update($request->all());

    //     return back()->with('success', 'Data user berhasil diupdate.');
    // }

    // Hapus data
    public function usersDelete(Request $request)
    {
        $profile = AlumniSiswaProfile::findOrFail($request->id);
        $profile->delete();

        return back()->with('success', 'Data user berhasil dihapus.');
    }


    public function usersMitra(Request $request)
    {
        if ($request->isMethod('post')) {
            $action = $request->input('action');

            switch ($action) {
                case 'store':
                    return $this->storeMitra($request);
                case 'update':
                    return $this->updateMitra($request);
                case 'delete':
                    return $this->deleteMitra($request);
            }
        }

        $profiles = MitraProfile::with('user')->get();
        return view('admin.usersmitra', ['title' => 'Users Mitra', 'profiles' => $profiles]);
    }

    private function storeMitra(Request $request)
    {
        $request->validate([
            'nama_instansi' => 'required|string',
            'penanggung_jawab' => 'required|string',
            'bidang_industri' => 'required|string',
            'kategori' => 'required|string',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->penanggung_jawab,
                'email' => $request->email,
                'password' => bcrypt('password'),
                'role' => 'mitra',
            ]);

            MitraProfile::create([
                'user_id' => $user->id,
                'nama_instansi' => $request->nama_instansi,
                'penanggung_jawab' => $request->penanggung_jawab,
                'bidang_industri' => $request->bidang_industri,
                'kategori' => $request->kategori,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'alamat' => $request->alamat,
            ]);
        });

        return redirect()->back()->with('success', 'Data mitra berhasil ditambahkan.');
    }

    private function updateMitra(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:mitra_profiles,id',
        ]);

        $profile = MitraProfile::findOrFail($request->id);
        $profile->update($request->except('_token', 'action', 'id'));

        return redirect()->back()->with('success', 'Data mitra berhasil diperbarui.');
    }

public function deleteMitra(Request $request, $id)
{
    // Gunakan parameter $id, BUKAN $request->id
    $user = User::findOrFail($id);

    // Hapus profil mitra jika ada relasi
    $user->mitraProfile()->delete();

    // Hapus user
    $user->delete();

    return redirect()->back()->with('success', 'Data mitra berhasil dihapus secara menyeluruh.');
}

}
