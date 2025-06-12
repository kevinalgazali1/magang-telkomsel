<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use App\Models\DaftarSertifikasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\SertifikasiStoreRequest;

class SertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('mitraProfile')->find(Auth::id());
        $sertifikasiMitraSendiri = Sertifikasi::where('user_id', $user->id)->get();
        $sertifikasiMitraLain = Sertifikasi::where('user_id', '!=', $user->id)->get();
        return view('mitra.sertifikasi', compact('sertifikasiMitraSendiri', 'sertifikasiMitraLain', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SertifikasiStoreRequest $request)
    {
        try {
            if ($request->validated()) {
                $user_id = $request->user()->id;
                $mitra = $request->user();

                $file = $request->file('foto_sertifikasi');
                $file_name = $file->hashName(); // nama unik
                $file->move(public_path('storage/assets/sertifikasi'), $file_name);

                Sertifikasi::create(
                    $request->except('foto_sertifikasi') + [
                        'foto_sertifikasi' => 'assets/sertifikasi/' . $file_name,
                        'user_id' => $user_id,
                        'mitra_id' => $mitra->id
                    ]
                );
            }

            return redirect()->back()->with('success', 'Sertifikasi Berhasil Dibuat');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Sertifikasi Gagal Dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sertif = Sertifikasi::findOrFail($id);

        $sertif->judul_sertifikasi = $request->judul_sertifikasi;
        $sertif->deskripsi = $request->deskripsi;
        $sertif->tanggal_mulai = $request->tanggal_mulai;
        $sertif->tanggal_selesai = $request->tanggal_selesai;
        $sertif->kota = $request->kota;
        $sertif->tempat = $request->tempat;
        $sertif->biaya = $request->biaya;

        if ($request->hasFile('foto_sertifikasi')) {
            // 🔥 Hapus file lama jika ada
            $oldPath = public_path('storage/' . $sertif->foto_sertifikasi);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            // 📥 Upload file baru
            $file = $request->file('foto_sertifikasi');
            $file_name = $file->hashName();
            $file->move(public_path('storage/assets/sertifikasi'), $file_name);

            // 💾 Simpan path baru
            $sertif->foto_sertifikasi = 'assets/sertifikasi/' . $file_name;
        }

        $sertif->save();

        return redirect()->back()->with('success', 'Sertifikasi berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sertif = Sertifikasi::findOrFail($id);
        if ($sertif->user_id != Auth::id()) {
            abort(403);
        }
        $sertif->delete();
        return redirect()->back()->with('success', 'Sertifikasi berhasil dihapus.');
    }

    public function getPeserta($id)
    {
        $peserta = DaftarSertifikasi::where('sertifikasi_id', $id)->get();
        return response()->json($peserta);
    }

    public function exportPesertaCsv($id)
    {
        $peserta = DaftarSertifikasi::where('sertifikasi_id', $id)->get();

        $filename = 'daftar_peserta_sertifikasi_' . $id . '.csv';
        $handle = fopen('php://temp', 'w+');

        fputcsv($handle, ['No', 'Nama Lengkap', 'Email', 'No. Telepon', 'Asal Sekolah', 'Jurusan', 'Jenis Kelamin', 'Tanggal Lahir', 'NIK', 'Tahun Kelulusan', 'NPSN', 'Provinsi', 'Kota', 'Alamat', 'Status Saat Ini', 'Bidang Pekerjaan', 'Sertifikasi Terakhir', 'Kesesuaian Sertifikasi', 'Nama Universitas', 'Jurusan Universitas']);

        foreach ($peserta as $index => $p) {
            fputcsv($handle, [
                $index + 1,
                $p->nama_lengkap,
                $p->email,
                $p->no_hp,
                $p->asal_sekolah,
                $p->jurusan,
                $p->jenis_kelamin,
                $p->tanggal_lahir,
                '="' . $p->nik . '"',
                $p->tahun_kelulusan,
                $p->npsn,
                $p->provinsi,
                $p->kota,
                $p->alamat,
                $p->status_saat_ini,
                $p->bidang_pekerjaan,
                $p->sertifikasi_terakhir,
                $p->kesesuaian_sertifikasi,
                $p->nama_universitas,
                $p->jurusan_universitas,
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
