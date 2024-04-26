<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apoteker extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'jadwal_praktik',
        'tempat_praktik',
        'kata_sandi_baru',
        'ulang_kata_sandi_baru'

    ];
}
