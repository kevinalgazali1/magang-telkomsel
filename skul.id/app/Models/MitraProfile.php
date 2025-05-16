<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraProfile extends Model
{
    protected $fillable = [
        'user_id',
        'penanggung_jawab',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
