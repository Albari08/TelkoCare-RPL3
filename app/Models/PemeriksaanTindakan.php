<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanTindakan extends Model
{
    use HasFactory;
    protected $table = 'pemeriksaan_tindakan';
    protected $guarded = ['id'];

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }
}
