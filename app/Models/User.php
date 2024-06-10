<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'nim',
        'jenis_kelamin',
        'nohp',
        'alamat',
        'email',
        'password',
    ];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
