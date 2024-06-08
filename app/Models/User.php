<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Antrian;
use App\Models\JadwalDokter;
use App\Models\LogUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'tanggal_lahir',
        'tempat_lahir',
        'nim',
        'jenis_kelamin',
        'nohp',
        'alamat',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function antrians(): HasMany
    {
        return $this->hasMany(Antrian::class);
    }
    public function log_users(): HasMany
    {
        return $this->hasMany(LogUser::class);
    }
    public function jadwal_dokters(): belongsToMany
    {
        return $this->belongsToMany(JadwalDokter::class, 'bookings');
    }
}