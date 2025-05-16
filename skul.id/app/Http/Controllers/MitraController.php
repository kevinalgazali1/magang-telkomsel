<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $User = User::all();
        return view('mitra.beranda', compact('User'));
    }

    public function sertifikasi()
    {
        $User = User::all();
        return view('mitra.sertifikasi', compact('User'));
    }

    public function loker ()
    {
        return view('mitra.loker');
    }

    public function pelatihan ()
    {
        return view('mitra.pelatihan');
    }
}
