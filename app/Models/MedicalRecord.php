<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'diagnosis',
        'intervention',
        'medication'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }
}
