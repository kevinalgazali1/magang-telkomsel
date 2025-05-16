<?php

namespace App\Http\Controllers;


use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'perusahaan' => 'required|string|max:255',
            'wilayah' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lisensi' => 'required|string|max:100',
            'file_sertifikat' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Proses upload file sertifikat jika ada
        $sertifikatPath = null;
        if ($request->hasFile('file_sertifikat')) {
            $sertifikatPath = $request->file('file_sertifikat')->store('sertifikat', 'public');
        }

        // Simpan ke database
        Sertifikasi::create([
            'judul_sertifikasi' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'wilayah' => $validated['wilayah'],
            'tanggal_mulai' => $validated['tanggal_mulai'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'nomor_lisensi' => $validated['lisensi'],
            'sertifikat' => $sertifikatPath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Sertifikasi berhasil ditambahkan.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
