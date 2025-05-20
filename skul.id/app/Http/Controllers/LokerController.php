<?php

namespace App\Http\Controllers;

use App\Http\Requests\LokerPostRequest;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $lokerMitraSendiri = Loker::where('user_id', $user->id)->get();
        $lokerMitraLain = Loker::where('user_id', '!=', $user->id)->get();
        return view('mitra.loker', compact('lokerMitraSendiri', 'lokerMitraLain'));
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
    public function store(LokerPostRequest $request)
    {
        try {
            if ($request->validated()) {
                $user_id = $request->user()->id;
                $gambar = $request->file('gambar')->store('assets/loker', 'public');
                Loker::create($request->except('gambar') + ['gambar' => $gambar, 'user_id' => $user_id]);
            }

            return redirect()->route('mitra.loker')->with('success', 'Lowongan Kerja Berhasil Dibuat');
        } catch (\Exception $e) {
            return redirect()->route('mitra.loker')->with('danger', 'Lowongan Kerja Gagal Dibuat');
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
    public function update(Request $request, string $id)
    {
        $loker = Loker::findOrFail($id);
        $loker->nama_perusahaan = $request->nama_perusahaan;
        $loker->deskripsi = $request->deskripsi;
        $loker->posisi = $request->posisi;
        $loker->lokasi = $request->lokasi;
        $loker->tipe = $request->tipe;
        $loker->pendidikan = $request->pendidikan;
        $loker->gaji = $request->gaji;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('loker', 'public');
            $loker->gambar = $path;
        }

        $loker->save();

        return redirect()->back()->with('success', 'Lowongan Kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loker = Loker::findOrFail($id);
        if ($loker->user_id != Auth::id()) {
            abort(403);
        }
        $loker->delete();
        return redirect()->route('mitra.loker')->with('success', 'Lowongan Kerja berhasil dihapus.');
    }
}
