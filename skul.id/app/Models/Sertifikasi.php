<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DaftarSertifikasi;

class Sertifikasi extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function daftar_sertifikasis()
    {
        return $this->hasMany(DaftarSertifikasi::class);
    }
}
