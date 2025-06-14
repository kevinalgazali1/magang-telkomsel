<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\Pelatihan;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use App\Models\AlumniSiswaProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AlumniSiswaController extends Controller
{
    public function index()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        return view('alumni-siswa.beranda', compact('user'));
    }

    public function addProfile()
    {
        $provinsi = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')->json();
        // Default: ambil kabupaten dari provinsi Sulawesi Selatan (id 73)
        $kabupaten = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/73.json')->json();

        $kode_kabupaten = '7371';

        $sekolah = Http::get("https://api-sekolah-indonesia.vercel.app/sekolah?kab_kota={$kode_kabupaten}&page=1&perPage=100")->json();

        $user = Auth::user();

        // Jika profile sudah lengkap, redirect ke halaman utama alumni
        if ($user->profile_complete) {
            return redirect()->route('alumni-siswa.index');
        }

        $no_hp = Auth::user()->no_hp;

        return view('alumni-siswa.addProfile', compact('no_hp', 'provinsi', 'kabupaten', 'sekolah'));
    }

    public function searchSekolah(Request $request)
    {
        $query = $request->input('q'); // dari Select2

        $response = Http::get('https://api-sekolah-indonesia.vercel.app/sekolah', [
            'perPage' => 100,
            'keyword' => $query,
        ]);

        $data = $response->json();
        $results = [];

        if (isset($data['dataSekolah'])) {
            foreach ($data['dataSekolah'] as $item) {
                if (in_array($item['bentuk'], ['SMA', 'SMK'])) {
                    $results[] = [
                        'id' => $item['sekolah'],
                        'text' => $item['sekolah'],
                        'npsn' => $item['npsn'],
                    ];
                }
            }
        }

        return response()->json(['results' => $results]);
    }




    public function storeProfile(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|unique:alumni_siswa_profiles,nik,' . Auth::id() . ',user_id',
            'tahun_kelulusan' => 'required|numeric',
            'jurusan_sekolah' => 'required|string',
            'asal_sekolah' => 'required|string',
            'no_telepon' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'status_saat_ini' => 'nullable|string',
            'bidang_pekerjaan' => 'nullable|string',
            'sertifikasi_terakhir' => 'nullable|string',
            'kesesuaian_sertifikasi' => 'nullable|string',
            'nama_universitas' => 'nullable|string',
            'jurusan_universitas' => 'nullable|string',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'npsn' => 'required|string',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // validasi file
        ]);

        // Simpan/update profil
        $validatedProfile = $validated;
        unset($validatedProfile['email']); // email bukan bagian profile

        // Simpan file jika ada
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $file_name = $file->hashName(); // nama unik
            $file->move(public_path('storage/assets/profile'), $file_name);

            // Simpan nama file ke kolom foto_profil
            $validatedProfile['foto_profil'] = 'assets/profile/' . $file_name;
        }

        $validatedProfile['user_id'] = Auth::id();

        AlumniSiswaProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedProfile
        );

        // Update user (email dan status profil)
        $user = User::find(Auth::id());
        $user->email = $validated['email'];
        $user->profile_complete = true;
        $user->save();

        return redirect()->route('alumni-siswa.index')->with('success', 'Profil berhasil disimpan!');
    }


    public function profile()
    {
        $user = User::with([
            'daftarSertifikasi.sertifikasi.mitra.mitraProfile',
            'daftarPelatihan.pelatihan.mitra.mitraProfile',
            'daftarLoker.loker.mitra.mitraProfile'
        ])->find(Auth::id());

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
            'nik' => 'required|string|unique:alumni_siswa_profiles,nik,' . $user->id . ',user_id',
            'kelas' => 'nullable|numeric',
            'tahun_kelulusan' => 'nullable|numeric',
            'jurusan_sekolah' => 'required|string',
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
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil atau buat profile
        $profile = AlumniSiswaProfile::firstOrNew(['user_id' => $user->id]);

        // Update field biasa
        $profile->nama_lengkap = $validated['nama_lengkap'];
        $profile->nik = $validated['nik'] ?? null;
        $profile->kelas = $validated['kelas'] ?? null;
        $profile->tahun_kelulusan = $validated['tahun_kelulusan'] ?? null;
        $profile->jurusan_sekolah = $validated['jurusan_sekolah'];
        $profile->asal_sekolah = $validated['asal_sekolah'];
        $profile->no_telepon = $validated['no_telepon'];
        $profile->jenis_kelamin = $validated['jenis_kelamin'];
        $profile->tanggal_lahir = $validated['tanggal_lahir'];
        $profile->alamat = $validated['alamat'];
        $profile->status_saat_ini = $validated['status_saat_ini'] ?? null;
        $profile->bidang_pekerjaan = $validated['bidang_pekerjaan'] ?? null;
        $profile->sertifikasi_terakhir = $validated['sertifikasi_terakhir'] ?? null;
        $profile->kesesuaian_sertifikasi = $validated['kesesuaian_sertifikasi'] ?? null;
        $profile->provinsi = $validated['provinsi'] ?? null;
        $profile->kota = $validated['kota'] ?? null;
        $profile->npsn = $validated['npsn'] ?? null;

        // ✅ Upload foto baru jika ada
        if ($request->hasFile('foto_profil')) {
            // 🔥 Hapus file lama
            if ($profile->foto_profil) {
                $oldPath = public_path('storage/' . $profile->foto_profil);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // 📥 Upload file baru
            $file = $request->file('foto_profil');
            $file_name = $file->hashName();
            $file->move(public_path('storage/assets/profile'), $file_name);

            // 💾 Simpan path baru
            $profile->foto_profil = 'assets/profile/' . $file_name;
        }

        $profile->save();

        // Update email user
        $user->email = $validated['email'];
        $user->save();

        return redirect()->route('alumni-siswa.profile')->with('success', 'Profil berhasil diperbarui!');
        return redirect()->route('alumni-siswa.profile')->with('errror', 'Profil berhasil diperbarui!');
    }

    public function sertifikasi()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        $sertifikasi = Sertifikasi::all();
        return view('alumni-siswa.sertifikasi', compact('user', 'sertifikasi'));
    }

    public function loker(Request $request)
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());

        $query = Loker::query();

        if ($request->filled('search')) {
            $searchTerm = strtolower($request->search);

            $query->where(function ($q) use ($searchTerm) {
                $q->whereRaw('LOWER(posisi) LIKE ?', ["%{$searchTerm}%"])
                    ->orWhereRaw('LOWER(nama_perusahaan) LIKE ?', ["%{$searchTerm}%"]);
            });
        }


        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        if ($request->filled('lokasi')) {
            $query->where('lokasi', $request->lokasi);
        }

        $loker = $query->paginate(9)->withQueryString();
        $lokasiList = Loker::select('lokasi')->distinct()->pluck('lokasi');

        return view('alumni-siswa.loker', compact('user', 'loker', 'lokasiList'));
    }

    public function pelatihan()
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());
        $pelatihan = Pelatihan::all();
        return view('alumni-siswa.pelatihan', compact('user', 'pelatihan'));
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

    public function lokerSearch(Request $request)
    {
        $user = User::with('alumniSiswaProfile')->find(Auth::id());

        $query = Loker::query();

        if ($request->filled('search')) {
            $searchTerm = strtolower($request->search);

            $query->where(function ($q) use ($searchTerm) {
                $q->whereRaw('LOWER(posisi) LIKE ?', ["%{$searchTerm}%"])
                    ->orWhereRaw('LOWER(nama_perusahaan) LIKE ?', ["%{$searchTerm}%"]);
            });
        }


        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        if ($request->filled('lokasi')) {
            $query->where('lokasi', $request->lokasi);
        }

        $loker = $query->paginate(9)->withQueryString();
        $lokasiList = Loker::select('lokasi')->distinct()->pluck('lokasi');

        return view('alumni-siswa.loker', compact('user', 'loker', 'lokasiList'));
    }
}
