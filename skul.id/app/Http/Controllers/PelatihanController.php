<?php

namespace App\Http\Controllers;

use App\Http\Requests\PelatihanStoreRequest;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $pelatihanMitraSendiri = Pelatihan::where('user_id', $user->id)->get();
        $pelatihanMitraLain = Pelatihan::where('user_id', '!=', $user->id)->get();
        return view('mitra.pelatihan', compact('pelatihanMitraSendiri', 'pelatihanMitraLain'));
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
                $foto_pelatihan = $request->file('foto_pelatihan')->store('assets/sertifikasi', 'public');
                Pelatihan::create($request->except('foto_pelatihan') + ['foto_pelatihan' => $foto_pelatihan, 'user_id' => $user_id]);
            }

            return redirect()->route('mitra.pelatihan')->with('success', 'Sertifikasi Berhasil Dibuat');
        } catch (\Exception $e) {
            return redirect()->route('mitra.pelatihan')->with('danger', 'Sertifikasi Gagal Dibuat');
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
            $path = $request->file('foto_pelatihan')->store('pelatihan', 'public');
            $pelatihan->foto_pelatihan = $path;
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
        return redirect()->route('mitra.pelatihan')->with('success', 'Pelatihan berhasil dihapus.');
    }
}
