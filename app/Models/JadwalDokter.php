<?php

namespace App\Models;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalDokter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class);
    }
}
