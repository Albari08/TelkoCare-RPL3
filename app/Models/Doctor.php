<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'doctor';

    protected $fillable = ['nama', 'alamat', 'nohp', 'keahlian', 'profile', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
