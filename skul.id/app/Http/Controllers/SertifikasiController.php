<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SertifikasiStoreRequest;

class SertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $sertifikasiMitraSendiri = Sertifikasi::where('user_id', $user->id)->get();
        $sertifikasiMitraLain = Sertifikasi::where('user_id', '!=', $user->id)->get();
        return view('mitra.sertifikasi', compact('sertifikasiMitraSendiri', 'sertifikasiMitraLain'));
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
                $foto_sertifikasi = $request->file('foto_sertifikasi')->store('assets/sertifikasi', 'public');
                Sertifikasi::create($request->except('foto_sertifikasi') + ['foto_sertifikasi' => $foto_sertifikasi, 'user_id' => $user_id]);
            }

            return redirect()->route('mitra.sertifikasi')->with('success', 'Sertifikasi Berhasil Dibuat');
        } catch (\Exception $e) {
            return redirect()->route('mitra.sertifikasi')->with('danger', 'Sertifikasi Gagal Dibuat');
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
            $path = $request->file('foto_sertifikasi')->store('sertifikasi', 'public');
            $sertif->foto_sertifikasi = $path;
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
        return redirect()->route('mitra.sertifikasi')->with('success', 'Sertifikasi berhasil dihapus.');
    }
}
