<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
    protected $table = 'pemeriksaan';
    protected $guarded = ['id'];

    public function obats()
    {
        return $this->hasMany(PemeriksaanObat::class, 'pemeriksaan_id', 'id');
    }

    public function tindakans()
    {
        return $this->hasMany(PemeriksaanTindakan::class, 'pemeriksaan_id', 'id');
    }
    public function diagnosas()
    {
        return $this->hasMany(PemeriksaanDiagnosa::class, 'pemeriksaan_id', 'id');
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
