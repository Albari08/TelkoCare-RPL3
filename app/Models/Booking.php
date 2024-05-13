<?php

namespace App\Models;

use App\Models\JadwalDokter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jadwal_dokter_id',
        'status'
    ];
    public function jadwalDokter()
    {
        return $this->belongsTo(JadwalDokter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}