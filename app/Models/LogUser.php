<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'waktu',
        'user_id',
        'aktifitas'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}