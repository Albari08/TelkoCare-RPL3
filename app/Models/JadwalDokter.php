<?php

namespace App\Models;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JadwalDokter extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'waktu',
        'dokter_id'
    ];
    
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookings');
    }
}