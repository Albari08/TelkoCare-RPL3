<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepDetailTemp extends Model
{
    use HasFactory;

    protected $table = 'resep_detail_temp';

    protected $fillable = [
        'nama_obat',
        'nama_alias_obat',
        'rute',
        'qty',
        'aturan_pakai',
    ];
}
