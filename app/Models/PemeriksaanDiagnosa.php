<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanDiagnosa extends Model
{
    use HasFactory;
    protected $table = 'pemeriksaan_diagnosa';
    protected $guarded = ['id'];

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }
}
