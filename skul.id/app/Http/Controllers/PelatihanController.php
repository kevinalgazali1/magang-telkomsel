<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PelatihanStoreRequest;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('mitraProfile')->find(Auth::id());
        $pelatihanMitraSendiri = Pelatihan::where('user_id', $user->id)->get();
        $pelatihanMitraLain = Pelatihan::where('user_id', '!=', $user->id)->get();
        return view('mitra.pelatihan', compact('pelatihanMitraSendiri', 'pelatihanMitraLain', 'user'));
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
    public function store(PelatihanStoreRequest $request)
    {
        try {
            if ($request->validated()) {
                $user_id = $request->user()->id;
                $mitra = $request->user();
                $file = $request->file('foto_pelatihan');
                $file_name = $file->hashName(); // nama unik
                $file->move(public_path('storage/assets/pelatihan'), $file_name);

                Pelatihan::create(
                    $request->except('foto_pelatihan') + [
                        'foto_pelatihan' => 'assets/pelatihan/' . $file_name,
                        'user_id' => $user_id,
                        'mitra_id' => $mitra->id,
                    ]
                );
            }

            return redirect()->back()->with('success', 'Pelatihan Berhasil Dibuat');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Pelatihan Gagal Dibuat');
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
        $pelatihan = Pelatihan::findOrFail($id);
        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->deskripsi = $request->deskripsi;
        $pelatihan->tanggal_mulai = $request->tanggal_mulai;
        $pelatihan->tanggal_selesai = $request->tanggal_selesai;
        $pelatihan->kota = $request->kota;
        $pelatihan->tempat_pelatihan = $request->tempat_pelatihan;
        $pelatihan->biaya = $request->biaya;

        if ($request->hasFile('foto_pelatihan')) {
            // 🔥 Hapus file lama jika ada
            $oldPath = public_path('storage/' . $pelatihan->foto_pelatihan);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            // 📥 Upload file baru
            $file = $request->file('foto_pelatihan');
            $file_name = $file->hashName();
            $file->move(public_path('storage/assets/pelatihan'), $file_name);

            // 💾 Simpan path baru
            $pelatihan->foto_pelatihan = 'assets/pelatihan/' . $file_name;
        }

        $pelatihan->save();

        return redirect()->back()->with('success', 'Pelatihan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        if ($pelatihan->user_id != Auth::id()) {
            abort(403);
        }
        $pelatihan->delete();
        return redirect()->back()->with('success', 'Pelatihan berhasil dihapus.');
    }
}
