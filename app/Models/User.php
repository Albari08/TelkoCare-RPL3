<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = 'web';

    protected $fillable = ['nama', 'tanggal_lahir', 'tempat_lahir', 'nim', 'jenis_kelamin', 'nohp', 'alamat', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
