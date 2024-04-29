<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'nama_alias_obat',
        'rute',
        'qty',
        'aturan_pakai',
        'resep_id',
    ];

    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }
}
