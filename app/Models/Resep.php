<?php

namespace App\Models;
// resep
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep';

    protected $fillable = [
        'kode_resep',
        'nama_pasien',
    ];

    public function resepDetails()
    {
        return $this->hasMany(ResepDetail::class);
    }
}
